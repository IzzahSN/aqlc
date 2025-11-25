<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\ClassModel;
use App\Models\JoinClass;
use App\Models\LessonPlan;
use App\Models\Schedule;
use App\Models\Tutor;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = ClassModel::with('tutor');

        // Expand setiap kelas jadi slot 30 minit
        $classes = $query->get()->flatMap(function ($c) {
            $slots = [];

            $start = \Carbon\Carbon::parse($c->start_time);
            $end   = \Carbon\Carbon::parse($c->end_time);

            while ($start < $end) {
                $next = $start->copy()->addMinutes(30);

                $cCopy = clone $c; // salin object asal
                $cCopy->slot = $start->format('H:i') . '-' . $next->format('H:i');
                $slots[] = $cCopy;

                $start = $next;
            }

            return $slots;
        });

        // kalau tiada kelas, terus return view kosong
        if ($classes->isEmpty()) {
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            return view('admin.class.schedule', [
                'timetable' => [],
                'days' => $days,
                'timeSlots' => [],
                'schedules' => collect(),
                'classes' => collect(),
                'tutors' => collect()
            ]);
        }

        // Ambil min & max masa ikut semua kelas
        $minStart = $classes->min(function ($c) {
            return \Carbon\Carbon::createFromFormat('H:i', explode('-', $c->slot)[0]);
        });
        $maxEnd = $classes->max(function ($c) {
            return \Carbon\Carbon::createFromFormat('H:i', explode('-', $c->slot)[1]);
        });

        // Generate slot dari min → max
        $timeSlots = [];
        $current = $minStart->copy();
        while ($current < $maxEnd) {
            $next = $current->copy()->addMinutes(30);
            $timeSlots[] = $current->format('H:i') . '-' . $next->format('H:i');
            $current = $next;
        }

        // Susun ikut hari & slot masa
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $timetable = [];
        foreach ($days as $day) {
            foreach ($timeSlots as $slot) {
                $timetable[$day][$slot] = $classes->filter(function ($c) use ($day, $slot) {
                    return $c->day == $day && $c->slot == $slot;
                });
            }
        }

        //display all schedule ->orderBy('day') ->orderBy('start_time') orderByDesc('schedules.date')
        $schedules = Schedule::select('schedules.*')
            ->join('class_models', 'schedules.class_id', '=', 'class_models.class_id')
            ->with('class.tutor')
            ->orderByDesc('schedules.date')
            ->orderBy('class_models.day')
            ->orderBy('class_models.start_time')
            ->get();

        // select semua tutor
        $tutors = Tutor::where('status', 'active')->get();

        // select semua class  ->orderBy('day') ->orderBy('start_time')
        $classes = ClassModel::with('tutor')->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('admin.class.schedule', compact('timetable', 'days', 'timeSlots', 'schedules', 'classes', 'tutors'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:class_models,class_id',
            'date' => 'required|date',
            'tutor_id' => 'required|exists:tutors,tutor_id',
            'relief' => 'nullable|exists:tutors,tutor_id',
        ]);

        // Elak duplicate schedule pada tarikh sama
        $exists = Schedule::where('class_id', $request->class_id)
            ->whereDate('date', $request->date)
            ->exists();

        if ($exists) {
            // return back()->with('error', 'This class already has a schedule on the selected date.')
            return back()->with('error', 'Kelas ini telahpun mempunyai jadual pada tarikh yang dipilih.')
                ->withInput();
        }

        $class = ClassModel::findOrFail($request->class_id);

        // Relief tak boleh sama dengan tutor asal
        if (!empty($request->relief) && $request->relief == $class->tutor_id) {
            // return back()->with('error', 'Relief tutor cannot be the same as the main tutor.')
            return back()->with('error', 'Tutor ganti tidak boleh sama dengan tutor utama.')
                ->withInput();
        }

        if (!empty($request->relief)) {
            // 1. Check kalau relief tutor ada class sebenar bertembung masa sama
            $teachingConflict = ClassModel::where('tutor_id', $request->relief)
                ->where('day', $class->day)
                ->where(function ($q) use ($class) {
                    $q->where(function ($query) use ($class) {
                        $query->where('start_time', '<', $class->end_time)
                            ->where('end_time', '>', $class->start_time);
                    });
                })
                ->exists();

            if ($teachingConflict) {
                // return back()->with('error', 'Relief tutor has a conflict with their own class schedule.')
                return back()->with('error', 'Tutor ganti mempunyai konflik dengan jadual kelasnya sendiri.')
                    ->withInput();
            }

            // 2. Check kalau relief tutor dah relief kelas lain pada waktu sama
            $reliefConflict = Schedule::where('relief', $request->relief)
                ->whereDate('date', $request->date)
                ->whereHas('class', function ($q) use ($class) {
                    $q->where('day', $class->day)
                        ->where(function ($query) use ($class) {
                            $query->where('start_time', '<', $class->end_time)
                                ->where('end_time', '>', $class->start_time);
                        });
                })
                ->exists();

            if ($reliefConflict) {
                // return back()->with('error', 'Relief tutor already assigned to another relief class that overlaps in time.')
                return back()->with('error', 'Tutor ganti telahpun ditugaskan ke kelas ganti lain yang bertembung masa.')
                    ->withInput();
            }
        }

        // 3. Simpan jika semua okay
        $schedule = Schedule::create([
            'class_id' => $request->class_id,
            'date' => $request->date,
            'tutor_id' => $request->tutor_id,
            'relief' => $request->relief,
        ]);

        // auto create attendance untuk semua student dalam class
        $students = JoinClass::where('class_id', $request->class_id)->pluck('student_id');
        foreach ($students as $student_id) {
            Attendance::create([
                'schedule_id' => $schedule->schedule_id,
                'student_id' => $student_id,
                'class_id' => $request->class_id,
                'status' => 0,
                'remark' => null,
            ]);
        }

        // auto create lesson plan
        LessonPlan::create([
            'schedule_id' => $schedule->schedule_id,
            'class_id' => $request->class_id,
            'title' => null,
            'learning_materials' => null,
            'descriptioon' => null,
        ]);

        // return back()->with('success', 'Class schedule created successfully.')
        return back()->with('success', 'Jadual kelas berjaya ditambah.')
            ->with('closeModalAdd', true);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $schedule = Schedule::with(['class.tutor', 'reliefTutor'])->findOrFail($id);

        return response()->json([
            'schedule_id' => $schedule->schedule_id,
            'date' => $schedule->date,
            'class_id' => $schedule->class_id,
            'tutor_id' => $schedule->class->tutor->tutor_id ?? null,
            'tutor_name' => $schedule->class->tutor->username ?? '',
            'relief' => $schedule->reliefTutor->tutor_id ?? '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        // Validation
        $validated = $request->validate([
            'class_id' => 'required|exists:class_models,class_id',
            'date' => 'required|date',
            'tutor_id' => 'required|exists:tutors,tutor_id',
            'relief' => 'nullable|exists:tutors,tutor_id',
        ]);

        $class = ClassModel::findOrFail($validated['class_id']);

        // 1️ Elak duplicate schedule pada tarikh sama untuk class yang sama (kecuali current record)
        $exists = Schedule::where('class_id', $validated['class_id'])
            ->whereDate('date', $validated['date'])
            ->where('schedule_id', '!=', $schedule->schedule_id)
            ->exists();

        if ($exists) {
            // return back()->with('error', 'This class already has a schedule on the selected date.')
            return back()->with('error', 'Kelas ini telahpun mempunyai jadual pada tarikh yang dipilih.')
                ->withInput();
        }

        // 2️ Relief tak boleh sama dengan tutor asal
        if (!empty($validated['relief']) && $validated['relief'] == $class->tutor_id) {
            // return back()->with('error', 'Relief tutor cannot be the same as the main tutor.')
            return back()->with('error', 'Tutor ganti tidak boleh sama dengan tutor utama.')
                ->withInput();
        }

        // 3️ Check conflict jika relief tutor diisi
        if (!empty($validated['relief'])) {

            // (a) Relief tutor ada class sebenar bertembung masa sama
            $teachingConflict = ClassModel::where('tutor_id', $validated['relief'])
                ->where('day', $class->day)
                ->where(function ($q) use ($class) {
                    $q->where(function ($query) use ($class) {
                        $query->where('start_time', '<', $class->end_time)
                            ->where('end_time', '>', $class->start_time);
                    });
                })
                ->exists();

            if ($teachingConflict) {
                // return back()->with('error', 'Relief tutor has a conflict with their own class schedule.')
                return back()->with('error', 'Tutor ganti mempunyai konflik dengan jadual kelasnya sendiri.')
                    ->withInput();
            }

            // (b) Relief tutor dah relief kelas lain waktu sama
            $reliefConflict = Schedule::where('relief', $validated['relief'])
                ->where('schedule_id', '!=', $schedule->schedule_id) // exclude current schedule
                ->whereDate('date', $validated['date'])
                ->whereHas('class', function ($q) use ($class) {
                    $q->where('day', $class->day)
                        ->where(function ($query) use ($class) {
                            $query->where('start_time', '<', $class->end_time)
                                ->where('end_time', '>', $class->start_time);
                        });
                })
                ->exists();

            if ($reliefConflict) {
                // return back()->with('error', 'Relief tutor already assigned to another relief class that overlaps in time.')
                return back()->with('error', 'Tutor ganti telahpun ditugaskan ke kelas ganti lain yang bertembung masa.')
                    ->withInput();
            }
        }

        // 4 Update record
        $schedule->update($validated);

        return redirect()->back()
            // ->with('success', 'Schedule updated successfully!')
            ->with('success', 'Jadual berjaya dikemaskini!')
            ->with('closeModalEdit', true);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
