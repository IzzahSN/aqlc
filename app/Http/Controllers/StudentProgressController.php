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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
