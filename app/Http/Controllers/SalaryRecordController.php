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
        // sort decending by salary_year and then by salary_month
        $salaryRecords = SalaryRecord::orderBy('salary_year', 'desc')
            ->orderByRaw("FIELD(salary_month, 'December', 'November', 'October', 'September', 'August', 'July', 'June', 'May', 'April', 'March', 'February', 'January')")
            ->get();
        return view('admin.payment.salary', compact('salaryRecords'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'salary_month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',
            'salary_year' => 'required|integer|min:2000|max:2100',
            'salary_rate' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
        ]);

        // Create a unique salary name based on month and year
        $salaryName = 'Salary-' . substr($request->salary_month, 0, 3) . '-' . $request->salary_year;

        // Check if a record with the same month and year already exists
        $existingRecord = SalaryRecord::where('salary_month', $request->salary_month)
            ->where('salary_year', $request->salary_year)
            ->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'Salary record for ' . $request->salary_month . ' ' . $request->salary_year . ' already exists.');
        }

        // Create the new salary record
        SalaryRecord::create([
            'salary_name' => $salaryName,
            'salary_month' => $request->salary_month,
            'salary_year' => $request->salary_year,
            'salary_rate' => $request->salary_rate,
            'salary_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Salary record for ' . $request->salary_month . ' ' . $request->year . ' has been created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $salaryRecord = SalaryRecord::findOrFail($id);
        return response()->json($salaryRecord);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $salaryRecord = SalaryRecord::findOrFail($id);

        $request->validate([
            'salary_name' => 'required|string|max:255',
            'salary_rate' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
        ]);

        // Update only the salary_rate
        $salaryRecord->update([
            'salary_rate' => $request->salary_rate,
        ]);
        return redirect()->back()->with('success', 'Salary record updated successfully!')->with('closeModalEdit', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $salaryRecord = SalaryRecord::findOrFail($id);
        $salaryRecord->delete();
        return redirect()->back()->with('success', 'Salary record deleted successfully!');
    }

    public function report($id)
    {
        $salaryRecord = SalaryRecord::findOrFail($id);
        return view('admin.payment.salary_report', compact('salaryRecord'));
    }
}
