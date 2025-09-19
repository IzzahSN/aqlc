<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Package;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $packageFilters = Package::all();
        $totalStudents = Student::count();
        $activeStudents = Student::where('status', 'active')->count();
        $inactiveStudents = Student::where('status', 'inactive')->count();

        // Auto update status semua kelas
        $classes = ClassModel::withCount('joinClasses')->get();

        foreach ($classes as $class) {
            if ($class->join_classes_count >= $class->capacity) {
                $class->status = 'Full';
            } else {
                $class->status = 'Available';
            }
            $class->save();
        }
        return view('admin.record.student', compact('students', 'totalStudents', 'activeStudents', 'inactiveStudents', 'packageFilters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'ic_number' => 'required|string|max:12|unique:students,ic_number',
            'birth_date' => 'nullable|date',
            'age' => 'nullable|integer|min:3',
            'gender' => 'required|in:Male,Female',
            'address' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
        //admission_date == current date
        $admission_date = Carbon::now();

        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'ic_number' => $request->ic_number,
            'birth_date' => $request->birth_date,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'status' => $request->status,
            'admission_date' => $admission_date,
        ]);
        return redirect()->back()->with('success', 'Student added successfully!')->with('closeModalAdd', true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'ic_number' => 'required|string|max:12|unique:students,ic_number,' . $student->student_id . ',student_id',
            'birth_date' => 'nullable|date',
            'age' => 'nullable|integer|min:3',
            'gender' => 'required|in:Male,Female',
            'address' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $student->update($request->all());
        return redirect()->back()->with('success', 'Student updated successfully!')->with('closeModalEdit', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cannot delete student if linked to guardian or class
        $student = Student::findOrFail($id);
        if ($student->guardians()->exists() || $student->classes()->exists()) {
            return redirect()->back()->with('error', 'Cannot delete student linked to guardian or class.');
        }
        $student->delete();
        return redirect()->route('admin.student.index')->with('success', 'Student deleted successfully.');
    }
}
