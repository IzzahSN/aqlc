<?php

namespace App\Http\Controllers;

use App\Models\LessonPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tutorIndex($id)
    {
        $lessonPlan = LessonPlan::find($id);
        $className = $lessonPlan && $lessonPlan->schedule ? $lessonPlan->schedule->class->class_name : 'N/A';
        $date = $lessonPlan && $lessonPlan->schedule ? $lessonPlan->schedule->date : 'N/A';
        return view('tutor.lesson_plan', compact('lessonPlan', 'id', 'className', 'date'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lessonPlan = LessonPlan::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'materials' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Handle file upload only if new file uploaded
        if ($request->hasFile('materials')) {
            $ext = $request->file('materials')->getClientOriginalExtension();

            // Rename ikut format: lessonplan_<scheduleID>_<timestamp>.ext
            $fileName = 'lessonplan_' . $lessonPlan->schedule_id . '_' . time() . '.' . $ext;

            // Simpan dalam folder "lesson_materials" (storage/app/public/lesson_materials)
            $filePath = $request->file('materials')->storeAs('lesson_materials', $fileName, 'public');

            // Delete old file kalau ada
            if ($lessonPlan->learning_materials && Storage::disk('public')->exists($lessonPlan->learning_materials)) {
                Storage::disk('public')->delete($lessonPlan->learning_materials);
            }

            $data['learning_materials'] = $filePath;
        }

        // Update record
        $lessonPlan->update($data);

        // return redirect()->back()->with('success', 'Lesson plan updated successfully!');
        return redirect()->back()->with('success', 'Rancangan pelajaran berjaya dikemaskini!');
    }

    public function index($id)
    {
        $lessonPlan = LessonPlan::find($id);
        $className = $lessonPlan && $lessonPlan->schedule ? $lessonPlan->schedule->class->class_name : 'N/A';
        $date = $lessonPlan && $lessonPlan->schedule ? $lessonPlan->schedule->date : 'N/A';
        return view('admin.report.lesson_plan', compact('lessonPlan', 'id', 'className', 'date'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function tutorUpdate(Request $request, $id)
    {
        $lessonPlan = LessonPlan::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'materials' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Handle file upload only if new file uploaded
        if ($request->hasFile('materials')) {
            $ext = $request->file('materials')->getClientOriginalExtension();

            // Rename ikut format: lessonplan_<scheduleID>_<timestamp>.ext
            $fileName = 'lessonplan_' . $lessonPlan->schedule_id . '_' . time() . '.' . $ext;

            // Simpan dalam folder "lesson_materials" (storage/app/public/lesson_materials)
            $filePath = $request->file('materials')->storeAs('lesson_materials', $fileName, 'public');

            // Delete old file kalau ada
            if ($lessonPlan->learning_materials && Storage::disk('public')->exists($lessonPlan->learning_materials)) {
                Storage::disk('public')->delete($lessonPlan->learning_materials);
            }

            $data['learning_materials'] = $filePath;
        }

        // Update record
        $lessonPlan->update($data);

        // return redirect()->back()->with('success', 'Lesson plan updated successfully!');
        return redirect()->back()->with('success', 'Rancangan pelajaran berjaya dikemaskini!');
    }
}
