<?php

namespace App\Http\Controllers;

use App\Models\BillHistory;
use App\Models\Schedule;
use App\Models\StudentBillRecord;
use Illuminate\Http\Request;

class StudentBillRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentBillRecords = StudentBillRecord::orderBy('student_bill_year', 'desc')
            ->orderByRaw("FIELD(student_bill_month, 'December', 'November', 'October', 'September', 'August', 'July', 'June', 'May', 'April', 'March', 'February', 'January')")
            ->get();
        return view('admin.payment.bills', compact('studentBillRecords'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_bill_month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',
            'student_bill_year' => 'required|integer|min:2000|max:2100',
        ]);

        // Create a unique bill name based on month and year
        $billName = 'Bill-' . substr($request->student_bill_month, 0, 3) . '-' . $request->student_bill_year;

        // Check if a record with the same month and year already exists
        $existingRecord = StudentBillRecord::where('student_bill_month', $request->student_bill_month)
            ->where('student_bill_year', $request->student_bill_year)
            ->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'Student bill record for ' . $request->student_bill_month . ' ' . $request->student_bill_year . ' already exists.');
        }

        // Create the new student bill record
        $studentBillRecord = StudentBillRecord::create([
            'student_bill_name' => $billName,
            'student_bill_month' => $request->student_bill_month,
            'student_bill_year' => $request->student_bill_year,
            'student_bill_date' => now(),
        ]);

        $this->createBillHistoriesForStudentBill($studentBillRecord);

        return redirect()->back()->with('success', 'Student bill record for ' . $request->student_bill_month . ' ' . $request->student_bill_year . ' has been created successfully.');
    }

    /**
     * Create bill histories for students who were enrolled in that month and year.
     */
    protected function createBillHistoriesForStudentBill(StudentBillRecord $studentBillRecord)
    {
        // Fetch schedules for the specified month and year
        $schedules = Schedule::whereYear('date', $studentBillRecord->student_bill_year)
            ->whereMonth('date', $this->getMonthNumber($studentBillRecord->student_bill_month))
            ->get();

        // Get unique student IDs from the schedules
        $studentIds = $schedules->pluck('student_id')->unique();

        // Create bill histories for each student, avoiding duplicates
        foreach ($studentIds as $studentId) {
            $existingBillHistory = BillHistory::where('student_id', $studentId)
                ->where('student_bill_id', $studentBillRecord->student_bill_id)
                ->first();

            if (!$existingBillHistory) {
                BillHistory::create([
                    'student_id' => $studentId,
                    'student_bill_record_id' => $studentBillRecord->student_bill_id,
                ]);
            }
        }
    }

    /**
     * Convert month name to month number.
     */
    private function getMonthNumber($monthName)
    {
        $months = [
            'anuary' => 1,
            'February' => 2,
            'March' => 3,
            'April' => 4,
            'May' => 5,
            'June' => 6,
            'July' => 7,
            'August' => 8,
            'September' => 9,
            'October' => 10,
            'November' => 11,
            'December' => 12,
        ];

        return $months[$monthName] ?? 1;
    }
}
