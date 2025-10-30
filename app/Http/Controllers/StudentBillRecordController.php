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

        return view('admin.payment.bills', compact('studentBillRecords', 'totalPaidStudentBill', 'totalUnpaidStudentBill', 'totalPendingStudentBill'));
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
