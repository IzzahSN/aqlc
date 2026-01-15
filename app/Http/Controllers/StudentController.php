<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Guardian;
use App\Models\Package;
use App\Models\Schedule;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        // return redirect()->back()->with('success', 'Student added successfully!')->with('closeModalAdd', true);
        return redirect()->back()->with('success', 'Pelajar berjaya ditambahkan!')->with('closeModalAdd', true);
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
        // return redirect()->back()->with('success', 'Student updated successfully!')->with('closeModalEdit', true);
        return redirect()->back()->with('success', 'Pelajar berjaya dikemaskini!')->with('closeModalEdit', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cannot delete student if linked to guardian or class
        $student = Student::findOrFail($id);
        if ($student->guardians()->exists() || $student->classes()->exists()) {
            // return redirect()->back()->with('error', 'Cannot delete student linked to guardian or class.');
            return redirect()->back()->with('error', 'Tidak boleh memadam pelajar yang dihubungkan dengan penjaga atau kelas.');
        }
        $student->delete();
        // return redirect()->route('admin.student.index')->with('success', 'Student deleted successfully.');
        return redirect()->route('admin.student.index')->with('success', 'Pelajar berjaya dipadam.');
    }

    public function report($id)
    {
        $student = Student::with(['guardians', 'packages', 'classes'])->findOrFail($id);
        // get student progress records sort by latest date from schedule table
        $progressRecords = $student->studentProgresses()
            ->with(['schedule.tutor', 'schedule.class', 'recitationModule'])
            ->orderByDesc(
                Schedule::select('date')
                    ->whereColumn('schedules.schedule_id', 'student_progress.schedule_id')
                    ->limit(1)
            )
            ->orderByDesc('student_progress.schedule_id')
            ->get();

        // get all student achievements
        $achievements = $student->achievements()->with('recitationModule')->get();
        return view('admin.record.student_report', compact('student', 'progressRecords', 'achievements'));
    }

    public function guardianReport()
    {
        $guardianId = session('user_id');
        $students = Student::whereHas('studentGuardians', function ($query) use ($guardianId) {
            $query->where('guardian_id', $guardianId);
        })
            ->with(['studentGuardians' => function ($query) use ($guardianId) {
                $query->where('guardian_id', $guardianId);
            }])
            ->get();
        return view('guardian.report', compact('students'));
    }

    public function guardianViewReport($id)
    {
        $guardianId = session('user_id');
        $student = Student::where('student_id', $id)
            ->whereHas('studentGuardians', function ($query) use ($guardianId) {
                $query->where('guardian_id', $guardianId);
            })
            ->with(['guardians', 'packages', 'classes'])
            ->firstOrFail();

        $progressRecords = $student->studentProgresses()
            ->with(['schedule.tutor', 'schedule.class', 'recitationModule'])
            ->orderByDesc(
                Schedule::select('date')
                    ->whereColumn('schedules.schedule_id', 'student_progress.schedule_id')
                    ->limit(1)
            )
            ->orderByDesc('student_progress.schedule_id')
            ->get();
        $achievements = $student->achievements()->with('recitationModule')->get();

        return view('guardian.student_report', compact('student', 'progressRecords', 'achievements'));
    }

    public function guardianEditReport($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function guardianUpdateReport(Request $request, $id)
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
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('profile');

        if ($request->hasFile('profile')) {
            $ext = $request->file('profile')->getClientOriginalExtension();
            $fileName = 'profile_' . Str::slug($request->first_name) . '_' . time() . '.' . $ext;
            $profilePath = $request->file('profile')->storeAs('profiles', $fileName, 'public');
            $data['profile'] = $profilePath;
        }

        $student->update($data);

        // return redirect()->back()->with('success', 'Student updated successfully!')->with('closeModalEdit', true);
        return redirect()->back()->with('success', 'Pelajar berjaya dikemaskini!')->with('closeModalEdit', true);
    }
}
