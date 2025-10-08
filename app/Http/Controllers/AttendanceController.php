<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $attendances = Attendance::with('student')->where('schedule_id', $id)->get();
        return view('admin.class.attendance', compact('attendances', 'id'));
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
    public function show(Attendance $attendance)
    {
        //
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
        }

        return back()->with('success', 'Attendance records updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
