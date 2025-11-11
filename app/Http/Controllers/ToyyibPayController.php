<?php

namespace App\Http\Controllers;

use App\Models\BillHistory;
use App\Models\Guardian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ToyyibPayController extends Controller
{
    public function createBill($bill_id)
    {
        $bill = BillHistory::with(['guardian', 'student', 'studentBill'])->findOrFail($bill_id);

        $guardianId = session('user_id');
        $guardian = Guardian::find($guardianId);
        $amount = $bill->bill_amount;
        $studentBill = $bill->studentBill;

        // Tentukan base URL bergantung pada environment
        $baseUrl = config('app.env') === 'local'
            ? 'http://127.0.0.1:8000'
            : 'https://assiraaj.amirul-hub.com';

        // Call ToyyibPay API to create bill
        $response = Http::asForm()->post('https://dev.toyyibpay.com/index.php/api/createBill', [
            'userSecretKey' => env('TOYYIBPAY_SECRET'),
            'categoryCode' => env('TOYYIBPAY_CATEGORY'),
            'billName' => Str::limit(
                $studentBill->student_bill_name . ' : ' . $bill->student->first_name . ' ' . $bill->student->last_name,
                30,
                ''
            ),
            'billDescription' => 'As-Siraaj Quran Learning Payment',
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $amount * 100, // must be in cents
            'billReturnUrl' => $baseUrl . '/guardian/student-bill/toyyibpay/return',
            'billCallbackUrl' => $baseUrl . '/guardian/student-bill/toyyibpay/callback',
            'billExternalReferenceNo' => $bill->bill_id,
            'billTo' => $guardian->first_name . ' ' . $guardian->last_name,
            'billEmail' => $guardian->email,
            'billPhone' => $guardian->phone_number,
            'billSplitPayment' => 0,
        ]);

        $data = $response->json();

        if (isset($data[0]['BillCode'])) {
            // dd($amount, $amount * 100);

            $billCode = $data[0]['BillCode'];

            // Save the transaction_id for reference
            $bill->transaction_id = $billCode;
            $bill->bill_type = 'Online Banking';
            $bill->guardian_id = $guardianId;
            $bill->save();

            return redirect('https://dev.toyyibpay.com/' . $billCode);
        } else {
            // dd($data);
            return back()->with('error', 'Unable to create ToyyibPay bill.');
        }
    }

    // Return URL (user redirected here after payment)
    public function return(Request $request)
    {
        // Terima parameter daripada ToyyibPay
        $status_id = $request->input('status_id'); // 1=Success, 2=Pending, 3=Failed
        $billcode = $request->input('billcode');
        $msg = $request->input('msg');

        // Cari bill berdasarkan transaction_id (BillCode)
        $bill = BillHistory::where('transaction_id', $billcode)->first();

        if (!$bill) {
            return redirect()->route('guardian.bill.index')->with('error', 'Bil tidak ditemui.');
        }

        // Update DB berdasarkan status
        if ($status_id == 1) {
            $bill->bill_status = 'Paid';
            $bill->bill_date = now();
            $bill->save();

            return redirect()->route('guardian.bill.index')->with('success', 'Pembayaran berjaya!');
        } else {
            $bill->bill_status = 'Unpaid'; // atau Pending ikut keperluan
            $bill->save();

            return redirect()->route('guardian.bill.index')->with('error', 'Pembayaran gagal atau dibatalkan.');
        }
    }

    // Callback (ToyyibPay notifies your system)
    // public function callback(Request $request)
    // {
    //     $transactionId = $request->billcode;
    //     $status = $request->status; // 1 = success, 2 = failed, 3 = pending

    //     $bill = BillHistory::where('transaction_id', $transactionId)->first();

    //     if ($bill) {
    //         if ($status == 1) {
    //             $bill->bill_status = 'Paid';
    //             $bill->bill_date = Carbon::now();
    //         } elseif ($status == 2) {
    //             $bill->bill_status = 'Unpaid';
    //         } else {
    //             $bill->bill_status = 'Pending';
    //         }

    //         $bill->save();
    //     }

    //     return response()->json(['status' => 'ok']);
    // }
}
