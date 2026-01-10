<?php

namespace App\Providers;

use App\Models\SmsLog;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (session('role') === 'guardian') {
                $guardianId = session('user_id');

                $studentIds = DB::table('student_guardians')
                    ->where('guardian_id', $guardianId)
                    ->pluck('student_id');

                $notifications = SmsLog::where('guardian_id', $guardianId)
                    ->orWhereIn('student_id', $studentIds)
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();

                $unreadCount = $notifications->where('status_app', 'unread')->count();

                $view->with(compact('notifications', 'unreadCount'));
            }
        });
    }
}
