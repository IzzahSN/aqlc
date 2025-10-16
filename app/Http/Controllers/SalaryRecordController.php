<?php

namespace App\Http\Controllers;

use App\Models\SalaryRecord;
use Illuminate\Http\Request;

class SalaryRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaryRecords = SalaryRecord::all();
        return view('admin.payment.salary', compact('salaryRecords'));
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
    public function show(SalaryRecord $salaryRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalaryRecord $salaryRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalaryRecord $salaryRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalaryRecord $salaryRecord)
    {
        //
    }
}
