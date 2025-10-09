<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\JoinPackageController;
use App\Http\Controllers\LessonPlanController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentGuardianController;
use App\Http\Controllers\StudentProgressController;
use App\Http\Controllers\TutorController;
use App\Models\ClassModel;
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
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

// =======================
// Admin Routes
// =======================
Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
    // DASHBOARD
    Route::get('/', fn() => view('dashboard.admin'))->name('dashboard');

    //////////////////////
    // RECORD MANAGEMENT//
    //////////////////////

    // STUDENT
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/student/report', fn() => view('admin.record.student_report'))->name('student.report');
    // JoinPackage Routes
    Route::get('/student/{id}/package/create', [JoinPackageController::class, 'create'])->name('student.package.create');
    Route::post('/student/{id}/package', [JoinPackageController::class, 'store'])->name('student.package.store');
    Route::get('/student/{studentId}/package/{id}/edit', [JoinPackageController::class, 'edit'])->name('student.package.edit');
    Route::put('/student/{studentId}/package/{id}', [JoinPackageController::class, 'update'])->name('student.package.update');
    Route::delete('/student/{studentId}/package/{id}', [JoinPackageController::class, 'destroy'])->name('student.package.destroy');
    Route::get('/api/package/{id}/classes', function ($id) {
        $classes = ClassModel::where('package_id', $id)->get();
        return response()->json($classes);
    });


    // GUARDIAN
    Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian.index');
    Route::post('/guardian', [GuardianController::class, 'store'])->name('guardian.store');
    Route::get('/guardian/{id}/edit', [GuardianController::class, 'edit'])->name('guardian.edit');
    Route::put('/guardian/{id}', [GuardianController::class, 'update'])->name('guardian.update');
    Route::delete('/guardian/{id}', [GuardianController::class, 'destroy'])->name('guardian.destroy');

    // StudentGuardian Routes
    Route::get('/guardian/{id}/children', [StudentGuardianController::class, 'adminViewChild'])->name('guardian.children.view');
    Route::post('/guardian/{id}/children', [StudentGuardianController::class, 'adminAddChild'])->name('guardian.children.add');
    Route::delete('/guardian/{guardianId}/children/{id}', [StudentGuardianController::class, 'adminDeleteChild'])->name('guardian.children.delete');

    // TUTOR
    Route::get('/tutor', [TutorController::class, 'index'])->name('tutor.index');
    Route::post('/tutor', [TutorController::class, 'store'])->name('tutor.store');
    Route::get('/tutor/{id}/edit', [TutorController::class, 'edit'])->name('tutor.edit');
    Route::put('/tutor/{id}', [TutorController::class, 'update'])->name('tutor.update');
    Route::delete('/tutor/{id}', [TutorController::class, 'destroy'])->name('tutor.destroy');
    Route::get('/tutor/report', fn() => view('admin.record.tutor_report'))->name('tutor.report');

    //////////////////////
    // CLASS MANAGEMENT //
    //////////////////////
    // CLASS
    Route::get('/class', [ClassModelController::class, 'index'])->name('class.index');
    Route::post('/class', [ClassModelController::class, 'store'])->name('class.store');
    Route::get('/class/{id}/edit', [ClassModelController::class, 'edit'])->name('class.edit');
    Route::put('/class/{id}', [ClassModelController::class, 'update'])->name('class.update');
    Route::delete('/class/{id}', [ClassModelController::class, 'destroy'])->name('class.destroy');
    Route::get('/class/{id}/report', [ClassModelController::class, 'report'])->name('class.report');

    // PACKAGE
    Route::get('/package', [PackageController::class, 'index'])->name('package.index');
    Route::post('/package', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/{id}/edit', [PackageController::class, 'edit'])->name('package.edit');
    Route::put('/package/{id}', [PackageController::class, 'update'])->name('package.update');
    Route::delete('/package/{id}', [PackageController::class, 'destroy'])->name('package.destroy');
    Route::get('/package/{id}/report', [PackageController::class, 'report'])->name('package.report');

    // SCHEDULE
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');

    Route::get('/schedule/{id}/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::put('/schedule/{id}/attendance', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::post('/schedule/{id}/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::delete('/schedule/{scheduleId}/attendance/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');

    // REPORT
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');

    Route::get('/report/grade', [StudentProgressController::class, 'index'])->name('grade.index');
    Route::put('/report/{id}/grade/', [StudentProgressController::class, 'update'])->name('grade.update');

    Route::get('/report/lesson-plan/{id}', [LessonPlanController::class, 'index'])->name('lesson-plan.index');
    Route::put('/report/lesson-plan/{id}', [LessonPlanController::class, 'update'])->name('lesson-plan.update');

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
