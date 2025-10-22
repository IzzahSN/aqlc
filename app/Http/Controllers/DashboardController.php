<?php

namespace App\Http\Controllers;

use App\Models\BillHistory;
use App\Models\Guardian;
use App\Models\JoinClass;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function guardianDashboard()
    {
        // kira jumlah anak yang dihubungkan kepada guardian ini
        $guardianId = session('user_id');
        $guardian = Guardian::find($guardianId);
        $childrenCount = $guardian->students()->count();
        session(['children_count' => $childrenCount]);

        // kire paid bill dari table bill_histories based on guardian_id which bill_status = 'paid'
        $paidBills = BillHistory::where('guardian_id', $guardianId)
            ->where('bill_status', 'Paid')
            ->sum('bill_amount');

        // kira total Unpaid bill from table bill_histories based on student_id yang dihubungkan kepada guardian ini melalui table student_guardians
        $unpaidBills = BillHistory::whereIn('student_id', function ($query) use ($guardianId) {
            $query->select('student_id')
                ->from('student_guardians')
                ->where('guardian_id', $guardianId);
        })
            ->where('bill_status', 'Unpaid')
            ->sum('bill_amount');
        session(['unpaid_bills' => $unpaidBills]);

        // Get all student IDs associated with this guardian
        $studentIds = $guardian->students()->pluck('students.student_id');

        // Get all classes that these students are enrolled in
        $classIds = JoinClass::whereIn('student_id', $studentIds)
            ->pluck('class_id')
            ->unique();

        // Get all schedules for these classes with related data and student info
        $schedules = Schedule::whereIn('class_id', $classIds)
            ->with([
                'class.tutor',
                'class.package',
                'class.joinClasses.student',
                'tutor',
                'reliefTutor'
            ])
            ->orderBy('date', 'desc')
            ->get();

        // Create a collection that combines schedule with student information
        $scheduleData = [];
        foreach ($schedules as $schedule) {
            // Get all students in this class that belong to this guardian
            $studentsInClass = $schedule->class->joinClasses()
                ->whereIn('student_id', $studentIds)
                ->with('student')
                ->get();

            foreach ($studentsInClass as $joinClass) {
                $scheduleData[] = (object)[
                    'schedule' => $schedule,
                    'student' => $joinClass->student,
                    'class' => $schedule->class,
                    'tutor' => $schedule->reliefTutor ?? $schedule->class->tutor,
                ];
            }
        }

        session(['schedules' => $schedules]);

        return view('dashboard.guardian', compact('guardian', 'childrenCount', 'paidBills', 'unpaidBills', 'scheduleData'));
    }
}
