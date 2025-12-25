<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Guardian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendSMS(Request $request, $id)
    {
        $request->validate([
            'guardian_id' => 'required|exists:guardians,guardian_id',
        ]);

        $achievement = Achievement::with(['smsLog', 'student'])->findOrFail($id);
        $smsLog = $achievement->smsLog;

        // Pastikan sms log memang wujud
        if (!$smsLog) {
            return back()->with('error', 'Rekod SMS tidak dijumpai.');
        }

        $guardian = Guardian::findOrFail($request->guardian_id);

        // Format phone (+6)
        $phone = '6' . $guardian->phone_number;

        try {
            // ==========================
            // SEND SMS (TextBee API)
            // ==========================
            Http::withHeaders([
                'x-api-key' => config('services.textbee.api_key'),
            ])->post(
                config('services.textbee.base_url') .
                    '/gateway/devices/' . config('services.textbee.device_id') .
                    '/send-sms',
                [
                    'recipients' => [$phone],
                    'message' => $smsLog->message, // tarik dari table sms_logs
                ]
            );

            // ==========================
            // UPDATE SMS LOG
            // ==========================
            $smsLog->update([
                'guardian_id'  => $guardian->guardian_id,
                'student_id'   => $achievement->student_id,
                'phone_number' => $phone,
                'sms_status'   => 'Sent',
                'sent_at'      => Carbon::now(),
            ]);

            return back()->with('success', 'SMS berjaya dihantar.');
        } catch (\Exception $e) {

            $smsLog->update([
                'sms_status' => 'Failed',
            ]);

            return back()->with('error', 'Gagal menghantar SMS.');
        }
    }
}
