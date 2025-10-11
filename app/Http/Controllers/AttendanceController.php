<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\StudentProgress;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $attendances = Attendance::with('student')->where('schedule_id', $id)->get();
        //get student yang active
        $students = Student::where('status', 'active')->get();
        return view('admin.class.attendance', compact('attendances', 'id', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
        ]);

        $schedule = Schedule::find($id);

        if (!$schedule) {
            return redirect()->back()->with('error', 'Schedule not found.')->with('openModalAdd', true);
        }

        $exists = Attendance::where('schedule_id', $id)
            ->where('student_id', $request->student_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Student already added to this schedule.')->with('openModalAdd', true);
        }

        Attendance::create([
            'schedule_id' => $id,
            'class_id' => $schedule->class_id,
            'tutor_id' => $schedule->tutor_id,
            'student_id' => $request->student_id,
            'status' => 0,
            'remark' => null,
        ]);

        return redirect()->back()->with('success', 'Student added successfully!')->with('closeModalAdd', true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'attendances' => 'required|array',
            'attendances.*.attendance_id' => 'required|exists:attendances,attendance_id',
            'attendances.*.status' => 'required|in:0,1',
            'attendances.*.remark' => 'nullable|string|max:255',
        ]);

        foreach ($validated['attendances'] as $data) {
            $attendance = Attendance::find($data['attendance_id']);

            if ($attendance->status == 1) continue; // skip kalau dah present

            $attendance->update([
                'status' => $data['status'],
                'remark' => $data['remark'],
            ]);

            // ✅ Tambah logic auto generate student_progress bila status = 1
            if ($data['status'] == 1) {
                StudentProgress::create([
                    'student_id' => $attendance->student_id,
                    'class_id' => $attendance->class_id,
                    'schedule_id' => $attendance->schedule_id,
                    'recitation_module_id' => null,
                    'page_number' => null,
                    'is_main_page' => 1,
                    'grade' => null,
                    'remark' => null,
                ]);
            }
        }

        return back()->with('success', 'Attendance records updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($scheduleId, $id)
    {
        $attendance = Attendance::where('schedule_id', $scheduleId)
            ->where('attendance_id', $id)
            ->first();

        if (!$attendance) {
            return response()->json(['status' => 'error', 'message' => 'Attendance record not found.'], 404);
        }

        if ($attendance->status == 1) {
            return response()->json(['status' => 'error', 'message' => 'Cannot delete attendance record. Student already marked as present.'], 400);
        }

        $attendance->delete();

        return response()->json(['status' => 'success', 'message' => 'Attendance record deleted successfully.']);
    }
}
