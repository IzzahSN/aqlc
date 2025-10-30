<?php

namespace App\Http\Controllers;

use App\Models\SalaryRecord;
use App\Models\Schedule;
use App\Models\BillHistory;
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

        // calculate total paid salary (only where salary_id not null)
        $totalPaidSalary = BillHistory::whereNotNull('salary_id')
            ->where('bill_status', 'Paid')
            ->sum('bill_amount');

        // calculate total Unpaid salary (only where salary_id not null)
        $totalUnpaidSalary = BillHistory::whereNotNull('salary_id')
            ->where('bill_status', 'Unpaid')
            ->sum('bill_amount');

        // calculate total Pending salary (only where salary_id not null)
        $totalPendingSalary = BillHistory::whereNotNull('salary_id')
            ->where('bill_status', 'Pending')
            ->sum('bill_amount');

        return view('admin.payment.salary', compact('salaryRecords', 'totalPaidSalary', 'totalUnpaidSalary', 'totalPendingSalary'));
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
        $salaryRecord = SalaryRecord::create([
            'salary_name' => $salaryName,
            'salary_month' => $request->salary_month,
            'salary_year' => $request->salary_year,
            'salary_rate' => $request->salary_rate,
            'salary_date' => now(),
        ]);

        // Auto create bill_histories for tutors who taught in that month and year
        $this->createBillHistoriesForSalary($salaryRecord);

        return redirect()->back()->with('success', 'Salary record for ' . $request->salary_month . ' ' . $request->salary_year . ' has been created successfully.');
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

    /**
     * Create bill_histories for tutors who taught in the given salary record's month and year
     */
    private function createBillHistoriesForSalary(SalaryRecord $salaryRecord)
    {
        // Get schedules for the month and year
        $schedules = Schedule::whereYear('date', $salaryRecord->salary_year)
            ->whereMonth('date', $this->getMonthNumber($salaryRecord->salary_month))
            ->with(['tutor', 'reliefTutor'])
            ->get();

        // Collect unique tutor_ids
        $tutors = collect();

        foreach ($schedules as $schedule) {
            $tutorId = $schedule->relief ? $schedule->relief : $schedule->tutor_id;
            if ($tutorId && !$tutors->contains($tutorId)) {
                $tutors->push($tutorId);
            }
        }

        // Create bill_history for each unique tutor, avoiding duplicates
        foreach ($tutors as $tutorId) {
            $existingBill = BillHistory::where('salary_id', $salaryRecord->salary_id)
                ->where('tutor_id', $tutorId)
                ->first();

            if (!$existingBill) {
                BillHistory::create([
                    'tutor_id' => $tutorId,
                    'salary_id' => $salaryRecord->salary_id,
                ]);
            }
        }
    }

    /**
     * Get month number from month name
     */
    private function getMonthNumber($monthName)
    {
        $months = [
            'January' => 1,
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
