<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Student;
use App\Models\StudentGuardian;
use Illuminate\Http\Request;

class StudentGuardianController extends Controller
{
    // View all children for guardian
    public function adminViewChild($guardianId)
    {
        $guardian = Guardian::findOrFail($guardianId);

        $students = StudentGuardian::with('student')
            ->where('guardian_id', $guardianId)
            ->get();

        // return JSON supaya boleh populate dalam JS
        return response()->json([
            'guardian' => $guardian,
            'students' => $students
        ]);
    }

    // Add child to guardian
    public function adminAddChild(Request $request, $guardianId)
    {
        $request->validate([
            'ic_number' => 'required|string|exists:students,ic_number',
            'relationship_type' => 'required|string',
        ]);

        // cari student ikut IC
        $student = Student::where('ic_number', $request->ic_number)->first();

        if (!$student) {
            return back()->with('error', 'Student IC not found.');
        }

        // check kalau dah wujud
        $exists = StudentGuardian::where('student_id', $student->student_id)
            ->where('guardian_id', $guardianId)
            ->exists();

        if ($exists) {
            return back()->with('error', 'This student is already linked to the guardian.');
        }

        // create record
        StudentGuardian::create([
            'student_id' => $student->student_id,
            'guardian_id' => $guardianId,
            'relationship_type' => $request->relationship_type,
        ]);

        return redirect()->back()->with('success', 'Child added successfully.')->with('closemodalAddChildren', true);
    }

    // Delete child link
    public function adminDeleteChild($guardianId, $id)
    {
        // Pastikan record student_guardian memang milik guardian itu
        $studentGuardian = StudentGuardian::where('guardian_id', $guardianId)
            ->where('student_id', $id) // id = student_guardian_id
            ->firstOrFail();

        $studentGuardian->delete(); // soft delete

        return redirect()->route('admin.guardian.index')->with('success', 'Child removed successfully.');
    }
}
