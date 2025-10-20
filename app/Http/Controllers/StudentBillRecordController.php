<?php

namespace App\Http\Controllers;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(StudentBillRecord $studentBillRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentBillRecord $studentBillRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentBillRecord $studentBillRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentBillRecord $studentBillRecord)
    {
        //
    }
}
