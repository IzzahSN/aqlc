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
