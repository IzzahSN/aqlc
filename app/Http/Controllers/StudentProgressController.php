<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\RecitationModule;
use App\Models\Schedule;
use App\Models\StudentProgress;
use Illuminate\Http\Request;

class StudentProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // Get current schedule
        $currentSchedule = Schedule::findOrFail($id);

        $studentProgresses = StudentProgress::where('schedule_id', $id)
            ->with(['student', 'recitationModule',])
            ->orderBy('student_id')        // kumpul ikut pelajar
            ->orderByDesc('is_main_page')  // main page dulu
            ->orderBy('page_number')       // susun ikut nombor muka surat
            ->get();

        // dapatkan semua studenet latest progree dalam studentProgresses
        $studentProgresses->load(['student.latestProgress.recitationModule']);

        //get module hannya status is_complete_series = 0
        $modules = RecitationModule::where('is_complete_series', 0)->get();

        return view('admin.report.grade', compact('studentProgresses', 'id', 'modules', 'currentSchedule'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'recitation_module_id' => 'required|integer|exists:recitation_modules,recitation_module_id',
            'page_number' => 'required|integer',
            'grade' => 'required|nullable|string',
            'remark' => 'nullable|string',
            'student_progress_id' => 'nullable|integer|exists:student_progress,student_progress_id',
            'schedule_id' => 'required|exists:schedules,schedule_id',
        ]);

        // Dapatkan progress pertama untuk ambil class_id (schedule_id dah ada dari form)
        $studentProgress = StudentProgress::where('student_id', $validated['student_id'])
            ->where('schedule_id', $validated['schedule_id'])
            ->first();

        // Semak module & validasi page range
        $module = RecitationModule::find($validated['recitation_module_id']);
        if ($module && ($validated['page_number'] < $module->start_page || $validated['page_number'] > $module->end_page)) {
            return redirect()->back()
                // ->withErrors(['page_number' => "Page must be between {$module->start_page} and {$module->end_page}"])
                ->withErrors(['page_number' => "Muka surat mesti antara {$module->start_page} dan {$module->end_page}"])
                ->withInput();
        }

        // Create new student progress
        StudentProgress::create([
            'student_id' => $validated['student_id'],
            'recitation_module_id' => $validated['recitation_module_id'],
            'page_number' => $validated['page_number'],
            'grade' => $validated['grade'] ?? null,
            'remark' => $validated['remark'] ?? null,
            'is_main_page' => 0,
            'schedule_id' => $validated['schedule_id'],
            'class_id' => $studentProgress ? $studentProgress->class_id : null,
        ]);

        // ✅ 1️⃣ Bila capai end_page → cipta achievement individu
        if ($module && $validated['page_number'] == $module->end_page) {
            $schedule = Schedule::find($validated['schedule_id']);

            $exists = Achievement::where('student_id', $validated['student_id'])
                ->where('recitation_module_id', $module->recitation_module_id)
                ->exists();

            if (!$exists) {
                Achievement::create([
                    'student_id' => $validated['student_id'],
                    'recitation_module_id' => $module->recitation_module_id,
                    'title' => 'Finished ' . $module->recitation_name,
                    'certificate' => null,
                    'completion_date' => $schedule ? $schedule->date : now(),
                ]);
            }

            // ✅ 2️⃣ Semak sama ada semua modul dalam level_type ni dah selesai
            $totalModules = RecitationModule::where('is_complete_series', 0)
                ->where('level_type', $module->level_type)
                ->count();

            $completedModules = Achievement::where('student_id', $validated['student_id'])
                ->whereHas('recitationModule', function ($q) use ($module) {
                    $q->where('is_complete_series', 0)
                        ->where('level_type', $module->level_type);
                })
                ->count();

            // Kalau semua module selesai → cipta achievement siri penuh
            if ($totalModules > 0 && $completedModules == $totalModules) {
                $seriesModule = RecitationModule::where('is_complete_series', 1)
                    ->where('level_type', $module->level_type)
                    ->first();

                if ($seriesModule) {
                    $hasSeriesAchievement = Achievement::where('student_id', $validated['student_id'])
                        ->where('recitation_module_id', $seriesModule->recitation_module_id)
                        ->exists();

                    if (!$hasSeriesAchievement) {
                        Achievement::create([
                            'student_id' => $validated['student_id'],
                            'recitation_module_id' => $seriesModule->recitation_module_id,
                            'title' => $seriesModule->recitation_name,
                            'certificate' => null,
                            'completion_date' => $schedule ? $schedule->date : now(),
                        ]);
                    }
                }
            }
        }

        // return redirect()->back()->with('success', 'Student progress added successfully.');
        return redirect()->back()->with('success', 'Kemajuan pelajar berjaya ditambah.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $schedule_id)
    {
        $validated = $request->validate([
            'level_type.*' => 'nullable|string',
            'recitation_module_id.*' => 'nullable|integer|exists:recitation_modules,recitation_module_id',
            'page_number.*' => 'nullable|integer',
            'grade.*' => 'nullable|string',
            'remark.*' => 'nullable|string',
        ]);

        $editableIds = $request->student_progress_id ?? [];

        foreach ($editableIds as $index => $id) {
            $progress = StudentProgress::find($id);

            if ($progress) {
                $progress->update([
                    'recitation_module_id' => $request->recitation_module_id[$index] ?? null,
                    'page_number' => $request->page_number[$index] ?? null,
                    'grade' => $request->grade[$index] ?? null,
                    'remark' => !empty($request->remark[$index]) ? $request->remark[$index] : '-',
                ]);

                // Dapatkan maklumat module & schedule
                $module = RecitationModule::find($progress->recitation_module_id);
                $schedule = Schedule::find($schedule_id);

                if ($module && $progress->page_number == $module->end_page) {
                    // === 1️⃣ Create achievement for individual module ===
                    $exists = Achievement::where('student_id', $progress->student_id)
                        ->where('recitation_module_id', $module->recitation_module_id)
                        ->exists();

                    if (!$exists) {
                        Achievement::create([
                            'student_id' => $progress->student_id,
                            'recitation_module_id' => $module->recitation_module_id,
                            'title' => 'Finished ' . $module->recitation_name,
                            'certificate' => null,
                            'completion_date' => $schedule ? $schedule->date : now(),
                        ]);
                    }

                    // === 2️⃣ Check if student finished all modules for this level type ===
                    // Kira total module yang is_complete_series=0 untuk level_type yang sama
                    $totalModules = RecitationModule::where('is_complete_series', 0)
                        ->where('level_type', $module->level_type)
                        ->count();

                    // Kira berapa module yang student dah capai untuk level_type ni
                    $completedModules = Achievement::where('student_id', $progress->student_id)
                        ->whereHas('recitationModule', function ($q) use ($module) {
                            $q->where('is_complete_series', 0)
                                ->where('level_type', $module->level_type);
                        })
                        ->count();

                    // Kalau jumlah dua-dua sama → semua module habis
                    if ($totalModules > 0 && $completedModules == $totalModules) {
                        // Cari module series yang complete (is_complete_series=1)
                        $seriesModule = RecitationModule::where('is_complete_series', 1)
                            ->where('level_type', $module->level_type)
                            ->first();

                        if ($seriesModule) {
                            // Elak duplicate achievement untuk siri ni
                            $hasSeriesAchievement = Achievement::where('student_id', $progress->student_id)
                                ->where('recitation_module_id', $seriesModule->recitation_module_id)
                                ->exists();

                            if (!$hasSeriesAchievement) {
                                Achievement::create([
                                    'student_id' => $progress->student_id,
                                    'recitation_module_id' => $seriesModule->recitation_module_id,
                                    'title' => $seriesModule->recitation_name,
                                    'certificate' => null,
                                    'completion_date' => $schedule ? $schedule->date : now(),
                                ]);
                            }
                        }
                    }
                }
            }
        }

        // return redirect()->back()->with('success', 'Student grades updated successfully.');
        return redirect()->back()->with('success', 'Gred pelajar berjaya dikemaskini.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($schedule_id, $id)
    {
        try {
            // Cari student progress berdasarkan schedule dan ID
            $studentProgress = StudentProgress::where('schedule_id', $schedule_id)
                ->where('student_progress_id', $id)
                ->first();

            if (!$studentProgress) {
                return response()->json([
                    'status' => 'error',
                    // 'message' => 'Student progress not found.'
                    'message' => 'Kemajuan pelajar tidak dijumpai.'
                ], 404);
            }

            // Dapatkan module berkaitan
            $module = RecitationModule::find($studentProgress->recitation_module_id);

            // Simpan data sebelum delete
            $studentId = $studentProgress->student_id;
            $moduleId = $studentProgress->recitation_module_id;
            $pageNumber = $studentProgress->page_number;

            // Delete student progress
            $studentProgress->delete();

            // ✅ Hanya pertimbangkan untuk delete achievement jika module wujud
            if ($module && $pageNumber == $module->end_page) {
                // Semak jika masih ada progress lain untuk module yang sama
                $hasOtherProgress = StudentProgress::where('student_id', $studentId)
                    ->where('recitation_module_id', $moduleId)
                    ->exists();

                // Jika tiada progress lain untuk module tu, baru delete achievement
                if (!$hasOtherProgress) {
                    $achievement = Achievement::where('student_id', $studentId)
                        ->where('recitation_module_id', $moduleId)
                        ->first();

                    if ($achievement) {
                        $achievement->delete();
                    }
                }

                // ✅ Handle complete series achievement
                $seriesModule = RecitationModule::where('is_complete_series', 1)
                    ->where('level_type', $module->level_type)
                    ->first();

                if ($seriesModule) {
                    // Dapatkan semua module dalam level_type yang bukan complete series
                    $allModules = RecitationModule::where('level_type', $module->level_type)
                        ->where('is_complete_series', 0)
                        ->pluck('recitation_module_id');

                    // Kira berapa banyak module yang pelajar ini masih ada achievement
                    $achievedModulesCount = Achievement::where('student_id', $studentId)
                        ->whereIn('recitation_module_id', $allModules)
                        ->count();

                    // Kalau pelajar sudah tiada achievement langsung dalam semua module siri ini,
                    // baru delete complete series achievement.
                    if ($achievedModulesCount == 0) {
                        $seriesAchievement = Achievement::where('student_id', $studentId)
                            ->where('recitation_module_id', $seriesModule->recitation_module_id)
                            ->first();

                        if ($seriesAchievement) {
                            $seriesAchievement->delete();
                        }
                    }
                }
            }

            return response()->json([
                'status' => 'success',
                // 'message' => 'Student progress deleted successfully.'
                'message' => 'Kemajuan pelajar berjaya dibuang.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // 'message' => 'Failed to delete student progress: ' . $e->getMessage()
                'message' => 'Gagal membuang kemajuan pelajar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function tutorIndex($id)
    {
        // Get current schedule
        $currentSchedule = Schedule::findOrFail($id);

        $studentProgresses = StudentProgress::where('schedule_id', $id)
            ->with(['student', 'recitationModule',])
            ->orderBy('student_id')        // kumpul ikut pelajar
            ->orderByDesc('is_main_page')  // main page dulu
            ->orderBy('page_number')       // susun ikut nombor muka surat
            ->get();

        // dapatkan semua studenet latest progree dalam studentProgresses
        $studentProgresses->load(['student.latestProgress.recitationModule']);

        //get module hannya status is_complete_series = 0
        $modules = RecitationModule::where('is_complete_series', 0)->get();

        return view('tutor.grade', compact('studentProgresses', 'id', 'modules', 'currentSchedule'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function tutorStore(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'recitation_module_id' => 'required|integer|exists:recitation_modules,recitation_module_id',
            'page_number' => 'required|integer',
            'grade' => 'required|nullable|string',
            'remark' => 'nullable|string',
            'student_progress_id' => 'nullable|integer|exists:student_progress,student_progress_id',
            'schedule_id' => 'required|exists:schedules,schedule_id',
        ]);

        // Dapatkan progress pertama untuk ambil class_id (schedule_id dah ada dari form)
        $studentProgress = StudentProgress::where('student_id', $validated['student_id'])
            ->where('schedule_id', $validated['schedule_id'])
            ->first();

        // Semak module & validasi page range
        $module = RecitationModule::find($validated['recitation_module_id']);
        if ($module && ($validated['page_number'] < $module->start_page || $validated['page_number'] > $module->end_page)) {
            return redirect()->back()
                // ->withErrors(['page_number' => "Page must be between {$module->start_page} and {$module->end_page}"])
                ->withErrors(['page_number' => "Muka surat mesti antara {$module->start_page} dan {$module->end_page}"])
                ->withInput();
        }

        // Create new student progress
        StudentProgress::create([
            'student_id' => $validated['student_id'],
            'recitation_module_id' => $validated['recitation_module_id'],
            'page_number' => $validated['page_number'],
            'grade' => $validated['grade'] ?? null,
            'remark' => $validated['remark'] ?? null,
            'is_main_page' => 0,
            'schedule_id' => $validated['schedule_id'],
            'class_id' => $studentProgress ? $studentProgress->class_id : null,
        ]);

        // ✅ 1️⃣ Bila capai end_page → cipta achievement individu
        if ($module && $validated['page_number'] == $module->end_page) {
            $schedule = Schedule::find($validated['schedule_id']);

            $exists = Achievement::where('student_id', $validated['student_id'])
                ->where('recitation_module_id', $module->recitation_module_id)
                ->exists();

            if (!$exists) {
                Achievement::create([
                    'student_id' => $validated['student_id'],
                    'recitation_module_id' => $module->recitation_module_id,
                    'title' => 'Finished ' . $module->recitation_name,
                    'certificate' => null,
                    'completion_date' => $schedule ? $schedule->date : now(),
                ]);
            }

            // ✅ 2️⃣ Semak sama ada semua modul dalam level_type ni dah selesai
            $totalModules = RecitationModule::where('is_complete_series', 0)
                ->where('level_type', $module->level_type)
                ->count();

            $completedModules = Achievement::where('student_id', $validated['student_id'])
                ->whereHas('recitationModule', function ($q) use ($module) {
                    $q->where('is_complete_series', 0)
                        ->where('level_type', $module->level_type);
                })
                ->count();

            // Kalau semua module selesai → cipta achievement siri penuh
            if ($totalModules > 0 && $completedModules == $totalModules) {
                $seriesModule = RecitationModule::where('is_complete_series', 1)
                    ->where('level_type', $module->level_type)
                    ->first();

                if ($seriesModule) {
                    $hasSeriesAchievement = Achievement::where('student_id', $validated['student_id'])
                        ->where('recitation_module_id', $seriesModule->recitation_module_id)
                        ->exists();

                    if (!$hasSeriesAchievement) {
                        Achievement::create([
                            'student_id' => $validated['student_id'],
                            'recitation_module_id' => $seriesModule->recitation_module_id,
                            'title' => $seriesModule->recitation_name,
                            'certificate' => null,
                            'completion_date' => $schedule ? $schedule->date : now(),
                        ]);
                    }
                }
            }
        }

        // return redirect()->back()->with('success', 'Student progress added successfully.');
        return redirect()->back()->with('success', 'Kemajuan pelajar berjaya ditambah.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function tutorUpdate(Request $request, $schedule_id)
    {
        $validated = $request->validate([
            'level_type.*' => 'nullable|string',
            'recitation_module_id.*' => 'nullable|integer|exists:recitation_modules,recitation_module_id',
            'page_number.*' => 'nullable|integer',
            'grade.*' => 'nullable|string',
            'remark.*' => 'nullable|string',
        ]);

        $editableIds = $request->student_progress_id ?? [];

        foreach ($editableIds as $index => $id) {
            $progress = StudentProgress::find($id);

            if ($progress) {
                $progress->update([
                    'recitation_module_id' => $request->recitation_module_id[$index] ?? null,
                    'page_number' => $request->page_number[$index] ?? null,
                    'grade' => $request->grade[$index] ?? null,
                    'remark' => !empty($request->remark[$index]) ? $request->remark[$index] : '-',
                ]);

                // Dapatkan maklumat module & schedule
                $module = RecitationModule::find($progress->recitation_module_id);
                $schedule = Schedule::find($schedule_id);

                if ($module && $progress->page_number == $module->end_page) {
                    // === 1️⃣ Create achievement for individual module ===
                    $exists = Achievement::where('student_id', $progress->student_id)
                        ->where('recitation_module_id', $module->recitation_module_id)
                        ->exists();

                    if (!$exists) {
                        Achievement::create([
                            'student_id' => $progress->student_id,
                            'recitation_module_id' => $module->recitation_module_id,
                            'title' => 'Finished ' . $module->recitation_name,
                            'certificate' => null,
                            'completion_date' => $schedule ? $schedule->date : now(),
                        ]);
                    }

                    // === 2️⃣ Check if student finished all modules for this level type ===
                    // Kira total module yang is_complete_series=0 untuk level_type yang sama
                    $totalModules = RecitationModule::where('is_complete_series', 0)
                        ->where('level_type', $module->level_type)
                        ->count();

                    // Kira berapa module yang student dah capai untuk level_type ni
                    $completedModules = Achievement::where('student_id', $progress->student_id)
                        ->whereHas('recitationModule', function ($q) use ($module) {
                            $q->where('is_complete_series', 0)
                                ->where('level_type', $module->level_type);
                        })
                        ->count();

                    // Kalau jumlah dua-dua sama → semua module habis
                    if ($totalModules > 0 && $completedModules == $totalModules) {
                        // Cari module series yang complete (is_complete_series=1)
                        $seriesModule = RecitationModule::where('is_complete_series', 1)
                            ->where('level_type', $module->level_type)
                            ->first();

                        if ($seriesModule) {
                            // Elak duplicate achievement untuk siri ni
                            $hasSeriesAchievement = Achievement::where('student_id', $progress->student_id)
                                ->where('recitation_module_id', $seriesModule->recitation_module_id)
                                ->exists();

                            if (!$hasSeriesAchievement) {
                                Achievement::create([
                                    'student_id' => $progress->student_id,
                                    'recitation_module_id' => $seriesModule->recitation_module_id,
                                    'title' => $seriesModule->recitation_name,
                                    'certificate' => null,
                                    'completion_date' => $schedule ? $schedule->date : now(),
                                ]);
                            }
                        }
                    }
                }
            }
        }

        // return redirect()->back()->with('success', 'Student grades updated successfully.');
        return redirect()->back()->with('success', 'Gred pelajar berjaya dikemaskini.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function tutorDestroy($schedule_id, $id)
    {
        try {
            // Cari student progress berdasarkan schedule dan ID
            $studentProgress = StudentProgress::where('schedule_id', $schedule_id)
                ->where('student_progress_id', $id)
                ->first();

            if (!$studentProgress) {
                return response()->json([
                    'status' => 'error',
                    // 'message' => 'Student progress not found.'
                    'message' => 'Kemajuan pelajar tidak dijumpai.'
                ], 404);
            }

            // Dapatkan module berkaitan
            $module = RecitationModule::find($studentProgress->recitation_module_id);

            // Simpan data sebelum delete
            $studentId = $studentProgress->student_id;
            $moduleId = $studentProgress->recitation_module_id;
            $pageNumber = $studentProgress->page_number;

            // Delete student progress
            $studentProgress->delete();

            // ✅ Hanya pertimbangkan untuk delete achievement jika module wujud
            if ($module && $pageNumber == $module->end_page) {
                // Semak jika masih ada progress lain untuk module yang sama
                $hasOtherProgress = StudentProgress::where('student_id', $studentId)
                    ->where('recitation_module_id', $moduleId)
                    ->exists();

                // Jika tiada progress lain untuk module tu, baru delete achievement
                if (!$hasOtherProgress) {
                    $achievement = Achievement::where('student_id', $studentId)
                        ->where('recitation_module_id', $moduleId)
                        ->first();

                    if ($achievement) {
                        $achievement->delete();
                    }
                }

                // ✅ Handle complete series achievement
                $seriesModule = RecitationModule::where('is_complete_series', 1)
                    ->where('level_type', $module->level_type)
                    ->first();

                if ($seriesModule) {
                    // Dapatkan semua module dalam level_type yang bukan complete series
                    $allModules = RecitationModule::where('level_type', $module->level_type)
                        ->where('is_complete_series', 0)
                        ->pluck('recitation_module_id');

                    // Kira berapa banyak module yang pelajar ini masih ada achievement
                    $achievedModulesCount = Achievement::where('student_id', $studentId)
                        ->whereIn('recitation_module_id', $allModules)
                        ->count();

                    // Kalau pelajar sudah tiada achievement langsung dalam semua module siri ini,
                    // baru delete complete series achievement.
                    if ($achievedModulesCount == 0) {
                        $seriesAchievement = Achievement::where('student_id', $studentId)
                            ->where('recitation_module_id', $seriesModule->recitation_module_id)
                            ->first();

                        if ($seriesAchievement) {
                            $seriesAchievement->delete();
                        }
                    }
                }
            }

            return response()->json([
                'status' => 'success',
                // 'message' => 'Student progress deleted successfully.'
                'message' => 'Kemajuan pelajar berjaya dibuang.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // 'message' => 'Failed to delete student progress: ' . $e->getMessage()
                'message' => 'Gagal membuang kemajuan pelajar: ' . $e->getMessage()
            ], 500);
        }
    }
}
