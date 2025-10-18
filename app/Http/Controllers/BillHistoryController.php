<?php

namespace App\Http\Controllers;

use App\Models\BillHistory;
use App\Models\SalaryRecord;
use App\Models\Schedule;
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

        // create new bill history for tutors who don't have one yet, based on the salary record month and year, with bill_amount calculated, (kalau ada relief not null, admbil tutor_id as relief, kalau relief null tutor_idd ad tutor_id)
        $tutorIds = Schedule::whereMonth('date', date('m', strtotime($salaryRecord->salary_month . ' 1')))
            ->whereYear('date', $salaryRecord->salary_year)
            ->distinct()
            ->get()
            ->map(function ($schedule) {
                return $schedule->relief ?? $schedule->tutor_id;
            })
            ->unique();
        foreach ($tutorIds as $tutorId) {
            $existingBillHistory = BillHistory::where('salary_id', $id)
                ->where('tutor_id', $tutorId)
                ->first();
            if (!$existingBillHistory) {
                $totalHours = Schedule::where(function ($query) use ($tutorId) {
                    $query->where(function ($q) use ($tutorId) {
                        $q->whereNull('relief')->where('tutor_id', $tutorId);
                    })->orWhere('relief', $tutorId);
                })
                    ->whereMonth('date', date('m', strtotime($salaryRecord->salary_month . ' 1')))
                    ->whereYear('date', $salaryRecord->salary_year)
                    ->with('class.package')
                    ->get()
                    ->sum(function ($schedule) {
                        $duration = $schedule->class->package->duration_per_sessions;
                        return $duration == '30 minutes' ? 0.5 : 1;
                    });
                $billAmount = $totalHours * $salaryRecord->salary_rate;
                BillHistory::create([
                    'salary_id' => $id,
                    'tutor_id' => $tutorId,
                    'bill_amount' => $billAmount,
                ]);
            }
        }

        // calculate bill_amount for all tutors in the salary record. dalam table schedules, count how many classes each tutor (kalau ada relief not null, admbil tutor_id as relief, kalau relief null tutor_idd ad tutor_id) taught in that month and year, tengok package_id pada kelas yang di ajar, kalau duration_per_Sessions = 30 minutes, kira as 0.5, kalau 1 hour kira as 1, then total kan darab dengan salary_rate dalam salary_records
        foreach ($billHistories as $billHistory) {
            $tutorId = $billHistory->tutor_id;
            $salaryRate = $salaryRecord->salary_rate;
            $totalHours = Schedule::where(function ($query) use ($tutorId) {
                $query->where(function ($q) use ($tutorId) {
                    $q->whereNull('relief')->where('tutor_id', $tutorId);
                })->orWhere('relief', $tutorId);
            })
                ->whereMonth('date', date('m', strtotime($salaryRecord->salary_month . ' 1')))
                ->whereYear('date', $salaryRecord->salary_year)
                ->with('class.package')
                ->get()
                ->sum(function ($schedule) {
                    $duration = $schedule->class->package->duration_per_sessions;
                    return $duration == '30 minutes' ? 0.5 : 1;
                });
            $billHistory->bill_amount = $totalHours * $salaryRate;
            $billHistory->save();
        }
        return view('admin.payment.salary_report', compact('salaryRecord', 'billHistories', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSalary(Request $request, $id)
    {
        $request->validate([
            'billHistories' => 'required|array',
            'billHistories.*.bill_id' => 'required|exists:bill_histories,bill_id',
            'billHistories.*.bill_receipt' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
        ]);

        foreach ($request->billHistories as $item) {
            $billHistory = BillHistory::findOrFail($item['bill_id']);

            // Handle file upload if provided
            if ($request->hasFile('billHistories.' . array_search($item, $request->billHistories) . '.bill_receipt')) {
                $file = $request->file('billHistories.' . array_search($item, $request->billHistories) . '.bill_receipt');
                $extension = $file->getClientOriginalExtension();
                $newName = 'receipt_' . date('m_Y') . '_' . $item['bill_id'] . '.' . $extension;
                $path = $file->storeAs('receipts', $newName, 'public');
                $billHistory->bill_receipt = $path;
            }

            // Update status if bill_recipt not null and date
            if ($billHistory->bill_receipt) {
                $billHistory->bill_status = 'Paid';
                $billHistory->bill_date = now();
            }

            $billHistory->save();
        }

        return redirect()->back()->with('success', 'Bill histories updated successfully.');
    }
}
