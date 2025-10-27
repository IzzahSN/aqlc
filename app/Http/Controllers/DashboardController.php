<?php

namespace App\Http\Controllers;

use App\Models\BillHistory;
use App\Models\Guardian;
use App\Models\JoinClass;
use App\Models\SalaryRecord;
use App\Models\Schedule;
use App\Models\StudentProgress;
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

        // show student latest progress from table student_progresses where student_id in studentIds, ambil paling latest berdasarkan date dekat schedule_id
        // $students = $package->joinPackages()
        //             ->with(['student.latestProgress.recitationModule'])
        //             ->get()
        //             ->pluck('student');
        $students = $guardian->students()
            ->with(['latestProgress.recitationModule'])
            ->get();
        session(['students' => $students]);

        return view('dashboard.guardian', compact('guardian', 'childrenCount', 'paidBills', 'unpaidBills', 'scheduleData', 'students'));
    }

    public function tutorDashboard()
    {
        $tutorId = session('user_id');

        // Total Classes assign in class_model table
        $totalClasses = Schedule::where('tutor_id', $tutorId)->distinct('class_id')->count('class_id');
        // return 0 if null
        if (!$totalClasses) {
            $totalClasses = 0;
        }
        session(['total_classes' => $totalClasses]);

        // Total Schedule in schedule_model table include relief tutor for current month and year
        $totalSchedules = Schedule::where(function ($query) use ($tutorId) {
            $query->where('tutor_id', $tutorId)->whereNull('relief');
        })->orWhere('relief', $tutorId)->with('class.package')
            ->whereMonth('date', date('m'))
            ->whereYear('date', date('Y'))
            ->count();
        // return 0 if null
        if (!$totalSchedules) {
            $totalSchedules = 0;
        }
        session(['total_schedules' => $totalSchedules]);

        // sum of Unpaid/pending salary from bill_histories table where tutor_id = $tutorId and bill_status = 'Unpaid' or 'Pending'
        $unpaidSalary = BillHistory::where('tutor_id', $tutorId)
            ->whereIn('bill_status', ['Unpaid', 'Pending'])
            ->sum('bill_amount');
        // return 0 if null
        if (!$unpaidSalary) {
            $unpaidSalary = 0;
        }
        session(['unpaid_salary' => $unpaidSalary]);

        // list all schedules for this tutor for current month with class
        $schedules = Schedule::where(function ($query) use ($tutorId) {
            $query->where('tutor_id', $tutorId)->whereNull('relief');
        })->orWhere('relief', $tutorId)->with('class.package')
            ->whereMonth('date', date('m'))
            ->whereYear('date', date('Y'))
            ->orderBy('date', 'desc')
            ->get();
        session(['schedules' => $schedules]);

        // get unique salary_year from salary_records, check the fk in bill_histories table(salary_id) to get the salary_id and get the salary_year for the tutor_id
        $salaryYears = SalaryRecord::select('salary_year')
            ->whereIn('salary_id', function ($query) use ($tutorId) {
                $query->select('salary_id')
                    ->from('bill_histories')
                    ->where('tutor_id', $tutorId);
            })
            ->distinct()
            ->orderBy('salary_year', 'desc')
            ->get();
        session(['salary_years' => $salaryYears]);

        return view('dashboard.tutor', compact('totalClasses', 'totalSchedules', 'unpaidSalary', 'schedules', 'salaryYears'));
    }

    public function getSalaryReport(Request $request)
    {
        $tutorId = session('user_id');
        $year = $request->input('year', date('Y')); // default current year

        // Initialize 12 months (Jan–Dec)
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $monthlySalaries = array_fill(0, 12, 0);

        // Ambil data berdasarkan tahun dan tutor
        $salaryData = BillHistory::with('salary')
            ->where('tutor_id', $tutorId)
            ->whereHas('salary', function ($query) use ($year) {
                $query->where('salary_year', $year);
            })
            ->get();

        // Masukkan data ikut bulan
        foreach ($salaryData as $record) {
            if ($record->salary && $record->salary->salary_month) {
                // Cari index bulan berdasarkan nama bulan
                $monthIndex = array_search($record->salary->salary_month, $months);
                if ($monthIndex !== false) {
                    $monthlySalaries[$monthIndex] = (float) $record->bill_amount;
                }
            }
        }

        return response()->json([
            'year' => $year,
            'data' => $monthlySalaries,
        ]);
    }
}
