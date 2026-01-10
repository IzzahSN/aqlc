<?php

namespace App\Http\Controllers;

use App\Models\SmsLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function open($id)
    {
        $guardianId = session('user_id');

        $studentIds = DB::table('student_guardians')
            ->where('guardian_id', $guardianId)
            ->pluck('student_id');

        $notification = SmsLog::where('sms_id', $id)
            ->where(function ($query) use ($guardianId, $studentIds) {
                $query->where('guardian_id', $guardianId)
                    ->orWhereIn('student_id', $studentIds);
            })
            ->firstOrFail();

        if ($notification->status_app === 'unread') {
            $notification->update(['status_app' => 'read']);
        }

        return redirect()->route('guardian.report.view', ['id' => $notification->student_id]);
    }

    public function all()
    {
        $guardianId = session('user_id');

        $notifications = SmsLog::where('guardian_id', $guardianId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.guardian.notifications', compact('notifications'));
    }
}
