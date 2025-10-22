<?php

namespace App\Http\Controllers;

use App\Models\BillHistory;
use App\Models\Guardian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function guardianDashboard()
    {
        // kira jumlah anak yang dihubungkan kepada guardian ini
        $guardianId = session('user_id');
        $guardian = Guardian::find($guardianId);
        $childrenCount = $guardian->students()->count();
        session(['children_count' => $childrenCount]);

        // kire paid bill dari table bill_histories based on guardian_id which bill_status = 'paid'
        $paidBills = BillHistory::where('guardian_id', $guardianId)
            ->where('bill_status', 'Paid')
            ->sum('bill_amount');

        // kira total Unpaid bill from table bill_histories based on student_id yang dihubungkan kepada guardian ini melalui table student_guardians
        $unpaidBills = BillHistory::whereIn('student_id', function ($query) use ($guardianId) {
            $query->select('student_id')
                ->from('student_guardians')
                ->where('guardian_id', $guardianId);
        })
            ->where('bill_status', 'Unpaid')
            ->sum('bill_amount');
        session(['unpaid_bills' => $unpaidBills]);
        return view('dashboard.guardian', compact('guardian', 'childrenCount', 'paidBills', 'unpaidBills'));
    }
}
