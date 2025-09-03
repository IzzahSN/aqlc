<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// =======================
// Public Routes
// =======================
Route::get('/', fn() => view('guest.home'))->name('home');
Route::get('/profile', fn() => view('guest.profile'))->name('profile');
Route::get('/contact', fn() => view('guest.contact'))->name('contact');


// =======================
// Auth Routes
// =======================
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', function () {
    session()->flush(); // clear semua session
    return redirect()->route('login');
})->name('logout');

Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

// =======================
// Admin Routes
// =======================
Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
    // DASHBOARD
    Route::get('/', fn() => view('dashboard.admin'))->name('dashboard');

    // RECORD
    Route::get('/student', fn() => view('admin.record.student'))->name('student');
    Route::get('/student/report', fn() => view('admin.record.student_report'))->name('student.report');

    Route::get('/guardian', fn() => view('admin.record.guardian'))->name('guardian');

    Route::get('/tutor', fn() => view('admin.record.tutor'))->name('tutor');
    Route::get('/tutor/report', fn() => view('admin.record.tutor_report'))->name('tutor.report');

    // CLASS
    Route::get('/class', fn() => view('admin.class.class'))->name('class');
    Route::get('/class/report', fn() => view('admin.class.class_report'))->name('class.report');

    Route::get('/package', fn() => view('admin.class.package'))->name('package');
    Route::get('/package/report', fn() => view('admin.class.package_report'))->name('package.report');

    Route::get('/schedule', fn() => view('admin.class.schedule'))->name('schedule');
    Route::get('/schedule/attendance', fn() => view('admin.class.attendance'))->name('schedule.attendance');

    // REPORT
    Route::get('/report', fn() => view('admin.report.index'))->name('report');
    Route::get('/report/grade', fn() => view('admin.report.grade'))->name('report.grade');
    Route::get('/report/lesson-plan', fn() => view('admin.report.lesson_plan'))->name('report.lesson-plan');

    // PAYMENT
    Route::get('/bill', fn() => view('admin.payment.bills'))->name('bill');
    Route::get('/bill/report', fn() => view('admin.payment.bills_report'))->name('bill.report');

    Route::get('/salary', fn() => view('admin.payment.salary'))->name('salary');
    Route::get('/salary/report', fn() => view('admin.payment.salary_report'))->name('salary.report');

    // NOTIFICATOIN
    Route::get('/notification', fn() => view('admin.notification.index'))->name('notification');

    // PROFILE
    Route::get('/profile', fn() => view('admin.profile'))->name('profile');
});

// =======================
// Tutor Routes
// =======================
Route::prefix('tutor')->name('tutor.')->middleware('role:tutor')->group(function () {
    // Dashboard
    Route::get('/', fn() => view('dashboard.tutor'))->name('dashboard');
    // Schedule
    Route::get('/schedule', fn() => view('tutor.schedule'))->name('schedule');
    Route::get('/schedule/attendance', fn() => view('tutor.attendance'))->name('schedule.attendance');

    // Report
    Route::get('/report', fn() => view('tutor.report'))->name('report');
    Route::get('/report/grade', fn() => view('tutor.grade'))->name('report.grade');
    Route::get('/report/lesson-plan', fn() => view('tutor.lesson_plan'))->name('report.lesson-plan');

    // Salary
    Route::get('/salary', fn() => view('tutor.salary'))->name('salary');
    // Profile
    Route::get('/profile', fn() => view('tutor.profile'))->name('profile');
});

// =======================
// Guardian Routes
// =======================
Route::prefix('guardian')->name('guardian.')->middleware('role:guardian')->group(function () {
    // Dashboard
    Route::get('/', fn() => view('dashboard.guardian'))->name('dashboard');
    // report
    Route::get('/report', fn() => view('guardian.report'))->name('report');
    // bill
    Route::get('/student-bill', fn() => view('guardian.bill'))->name('bill');
    // profile
    Route::get('/profile', fn() => view('guardian.profile'))->name('profile');
});
