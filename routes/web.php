<?php

use Illuminate\Support\Facades\Route;

// =======================
// Public Routes
// =======================
Route::get('/', fn() => view('welcome'))->name('welcome');

// =======================
// Auth Routes
// =======================
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', fn() => view('auth.login'))->name('login');
    Route::get('/register/guardian', fn() => view('auth.register-guardian'))->name('register.guardian');
});

// =======================
// Admin Routes
// =======================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => view('dashboard.admin'))->name('dashboard');

    Route::get('/student', fn() => view('admin.record.student'))->name('student');
    Route::get('/student/report', fn() => view('admin.record.student_report'))->name('student.report');

    Route::get('/guardian', fn() => view('admin.record.guardian'))->name('guardian');
    Route::get('/tutor', fn() => view('admin.record.tutor'))->name('tutor');
    Route::get('/tutor/report', fn() => view('admin.record.tutor_report'))->name('tutor.report');

    Route::get('/class', fn() => view('admin.class.class'))->name('class');
    Route::get('/package', fn() => view('admin.class.package'))->name('package');
    Route::get('/schedule', fn() => view('admin.class.schedule'))->name('schedule');

    Route::get('/report', fn() => view('admin.report.index'))->name('report');

    Route::get('/bill', fn() => view('admin.payment.bills'))->name('bill');
    Route::get('/salary', fn() => view('admin.payment.salary'))->name('salary');

    Route::get('/notification', fn() => view('admin.notification.index'))->name('notification');

    Route::get('/profile', fn() => view('admin.profile'))->name('profile');
});

// =======================
// Tutor Routes
// =======================
Route::prefix('tutor')->name('tutor.')->group(function () {
    Route::get('/', fn() => view('dashboard.tutor.index'))->name('dashboard');

    Route::get('/schedule', fn() => view('dashboard.tutor.schedule'))->name('schedule');
    Route::get('/lesson-plans', fn() => view('dashboard.tutor.lesson-plans'))->name('lesson-plans');
    Route::get('/student-progress', fn() => view('dashboard.tutor.student-progress'))->name('student-progress');
    Route::get('/reports', fn() => view('dashboard.tutor.reports'))->name('reports');
    Route::get('/settings', fn() => view('dashboard.tutor.settings'))->name('settings');
});

// =======================
// Guardian Routes
// =======================
Route::prefix('guardian')->name('guardian.')->group(function () {
    Route::get('/', fn() => view('dashboard.guardian.index'))->name('dashboard');

    Route::get('/students', fn() => view('dashboard.guardian.students'))->name('students');
    Route::get('/progress', fn() => view('dashboard.guardian.progress'))->name('progress');
    Route::get('/payments', fn() => view('dashboard.guardian.payments'))->name('payments');
    Route::get('/payment-history', fn() => view('dashboard.guardian.payment-history'))->name('payment-history');
    Route::get('/notifications', fn() => view('dashboard.guardian.notifications'))->name('notifications');
    Route::get('/reports', fn() => view('dashboard.guardian.reports'))->name('reports');
    Route::get('/settings', fn() => view('dashboard.guardian.settings'))->name('settings');
});
