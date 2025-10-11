<?php

namespace App\Http\Controllers;

use App\Models\RecitationModule;
use App\Models\StudentProgress;
use Illuminate\Http\Request;

class StudentProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $studentProgresses  = StudentProgress::where('schedule_id', $id)->with('student')->get();
        $modules = RecitationModule::all();
        return view('admin.report.grade', compact('studentProgresses', 'id', 'modules'));
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
            'grade' => 'nullable|string',
            'remark' => 'nullable|string',
            'student_progress_id' => 'nullable|integer|exists:student_progress,student_progress_id',
        ]);

        // Dapatkan progress pertama untuk ambil schedule & class
        $studentProgress = StudentProgress::where('student_id', $validated['student_id'])->first();

        // Server side range check
        $module = RecitationModule::where('recitation_module_id', $validated['recitation_module_id'])->first();
        if ($module && ($validated['page_number'] < $module->start_page || $validated['page_number'] > $module->end_page)) {
            return redirect()->back()
                ->withErrors(['page_number' => "Page must be between {$module->start_page} and {$module->end_page}"])
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
            'schedule_id' => $studentProgress ? $studentProgress->schedule_id : null,
            'class_id' => $studentProgress ? $studentProgress->class_id : null,
        ]);

        return redirect()->back()->with('success', 'Student progress added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(StudentProgress $studentProgress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentProgress $studentProgress)
    {
        //
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

        // ambil semua pelajar berdasarkan schedule_id
        $studentProgresses = StudentProgress::where('schedule_id', $schedule_id)->get();

        foreach ($studentProgresses as $index => $progress) {
            $progress->update([
                'recitation_module_id' => $request->recitation_module_id[$index] ?? null,
                'page_number' => $request->page_number[$index] ?? null,
                'grade' => $request->grade[$index] ?? null,
                'remark' => $request->remark[$index] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'Student grades updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentProgress $studentProgress)
    {
        //
    }
}
