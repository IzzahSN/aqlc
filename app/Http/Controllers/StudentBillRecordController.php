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

        // calculate total paid stdent bill (only where student_bill_id not null)
        $totalPaidStudentBill = BillHistory::whereNotNull('student_bill_id')
            ->where('bill_status', 'Paid')
            ->sum('bill_amount');

        // calculate total Unpaid student bill (only where student_bill_id not null)
        $totalUnpaidStudentBill = BillHistory::whereNotNull('student_bill_id')
            ->where('bill_status', 'Unpaid')
            ->sum('bill_amount');

        // calculate total Pending student bill (only where student_bill_id not null)
        $totalPendingStudentBill = BillHistory::whereNotNull('student_bill_id')
            ->where('bill_status', 'Pending')
            ->sum('bill_amount');

        // get unique student_bill_year from student_bill_records, check the fk in bill_histories table(student_bill_id) to get the student_bill_id and get the student_bill_year
        $studentBillYears = StudentBillRecord::join('bill_histories', 'student_bill_records.student_bill_id', '=', 'bill_histories.student_bill_id')
            ->select('student_bill_records.student_bill_year')
            ->distinct()
            ->orderBy('student_bill_records.student_bill_year', 'desc')
            ->get();
        session(['student_bill_years' => $studentBillYears]);

        return view('admin.payment.bills', compact('studentBillRecords', 'totalPaidStudentBill', 'totalUnpaidStudentBill', 'totalPendingStudentBill', 'studentBillYears'));
    }

    public function getBillReport(Request $request)
    {
        $year = $request->input('year', date('Y')); // default current year

        // Senarai bulan
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
            'December',
        ];

        $billData = array_fill(0, 12, 0);

        // Ambil hanya rekod bill_status = 'Paid' dan ada student_bill_id
        $bills = BillHistory::whereNotNull('student_bill_id')
            ->with('studentBill')
            ->where('bill_status', 'Paid')
            ->whereHas('studentBill', function ($query) use ($year) {
                $query->where('student_bill_year', $year);
            })
            ->get();

        // Kira jumlah bil bagi setiap bulan
        foreach ($bills as $bill) {
            if ($bill->studentBill && $bill->studentBill->student_bill_month) {
                $monthIndex = array_search($bill->studentBill->student_bill_month, $months);
                if ($monthIndex !== false) {
                    $billData[$monthIndex] += $bill->bill_amount;
                }
            }
        }

        return response()->json([
            'year' => $year,
            'data' => $billData,
        ]);
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

        return redirect()->back()->with('success', 'Student bill record for ' . $request->student_bill_month . ' ' . $request->student_bill_year . ' has been created successfully.');
    }
}
