<?php

namespace App\Http\Controllers;

use App\Models\BillHistory;
use App\Models\SalaryRecord;
use Illuminate\Http\Request;

class BillHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexSalary($id)
    {
        // display all bill histories for a specific salary record
        $salaryRecord = SalaryRecord::findOrFail($id);
        $billHistories = BillHistory::where('salary_id', $id)->get();
        return view('admin.payment.salary_report', compact('salaryRecord', 'billHistories'));
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
    public function show(BillHistory $billHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BillHistory $billHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BillHistory $billHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BillHistory $billHistory)
    {
        //
    }
}
