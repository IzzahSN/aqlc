<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillHistoryController;
use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoinPackageController;
use App\Http\Controllers\LessonPlanController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecitationModuleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryRecordController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentBillRecordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentGuardianController;
use App\Http\Controllers\StudentProgressController;
use App\Http\Controllers\ToyyibPayController;
use App\Http\Controllers\TutorController;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Route;

// =======================
// Public Routes
// =======================
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


// =======================
// Auth Routes
// =======================
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// =======================
// Admin Routes
// =======================
Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
    // DASHBOARD
    Route::get('/', [DashboardController::class, 'adminDashboard'])->name('dashboard');

    //////////////////////
    // RECORD MANAGEMENT//
    //////////////////////

    // STUDENT
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/student/{id}/report', [StudentController::class, 'report'])->name('student.report');

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
    Route::get('/tutor/{id}/report', [TutorController::class, 'report'])->name('tutor.report');

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

    Route::get('/schedule/{id}/attendance', [AttendanceController::class, 'index'])->name('schedule.attendance.index');
    Route::put('/schedule/{id}/attendance', [AttendanceController::class, 'update'])->name('schedule.attendance.update');
    Route::post('/schedule/{id}/attendance', [AttendanceController::class, 'store'])->name('schedule.attendance.store');
    Route::delete('/schedule/{scheduleId}/attendance/{id}', [AttendanceController::class, 'destroy'])->name('schedule.attendance.destroy');

    //////////////////////
    // REPORT MANAGEMENT //
    //////////////////////

    // GRADE & LESSON PLAN
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');

    // GRADE
    Route::get('/report/{id}/grade', [StudentProgressController::class, 'index'])->name('report.grade.index');
    Route::post('/report/grade', [StudentProgressController::class, 'store'])->name('report.grade.store');
    Route::put('/report/{id}/grade', [StudentProgressController::class, 'update'])->name('report.grade.update');
    Route::delete('/report/{scheduleId}/grade/{id}', [StudentProgressController::class, 'destroy'])->name('report.grade.destroy');

    // LESSON PLAN
    Route::get('/report/{id}/lesson-plan', [LessonPlanController::class, 'index'])->name('report.lesson-plan.index');
    Route::put('/report/{id}/lesson-plan', [LessonPlanController::class, 'update'])->name('report.lesson-plan.update');

    // ACHIEVEMENT
    Route::get('/achievement', [AchievementController::class, 'index'])->name('achievement.index');
    Route::get('/achievement/{achievement_id}/certificate', [AchievementController::class, 'viewCertificate'])->name('achievement.certificate');

    // MODULE
    Route::get('/module', [RecitationModuleController::class, 'index'])->name('module.index');
    Route::post('/module', [RecitationModuleController::class, 'store'])->name('module.store');
    Route::get('/module/{id}/edit', [RecitationModuleController::class, 'edit'])->name('module.edit');
    Route::put('/module/{id}', [RecitationModuleController::class, 'update'])->name('module.update');
    Route::delete('/module/{id}', [RecitationModuleController::class, 'destroy'])->name('module.destroy');

    // PAYMENT
    Route::get('/bill', [StudentBillRecordController::class, 'index'])->name('bill.index');
    Route::get('/bill-report', [StudentBillRecordController::class, 'getBillReport'])->name('bill.report');
    Route::post('/bill', [StudentBillRecordController::class, 'store'])->name('bill.store');

    Route::get('/bill/{id}/report', [BillHistoryController::class, 'indexStudentBill'])->name('bill.report.index');
    Route::put('/bill/{id}/report', [BillHistoryController::class, 'updateStudentBill'])->name('bill.report.update');
    Route::get('/bill/{id}/receipt', [BillHistoryController::class, 'receipt'])->name('bill.report.receipt');


    // SALARY
    Route::get('/salary', [SalaryRecordController::class, 'index'])->name('salary.index');
    Route::get('/salary-report', [SalaryRecordController::class, 'getSalaryReport'])->name('salary.report');
    Route::post('/salary', [SalaryRecordController::class, 'store'])->name('salary.store');
    Route::get('/salary/{id}/edit', [SalaryRecordController::class, 'edit'])->name('salary.edit');
    Route::put('/salary/{id}', [SalaryRecordController::class, 'update'])->name('salary.update');
    Route::delete('/salary/{id}', [SalaryRecordController::class, 'destroy'])->name('salary.destroy');

    Route::get('/salary/{id}/report', [BillHistoryController::class, 'indexSalary'])->name('salary.report.index');
    Route::put('/salary/{id}/report', [BillHistoryController::class, 'updateSalary'])->name('salary.report.update');
    Route::get('/salary/{id}/receipt', [BillHistoryController::class, 'receiptSalary'])->name('salary.report.receipt');

    // NOTIFICATOIN
    Route::get('/notification', fn() => view('admin.notification.index'))->name('notification');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'showAdminProfile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateAdminProfile'])->name('profile.update');
    Route::put('/profile/education', [ProfileController::class, 'updateAdminEducation'])->name('profile.education.update');
});

// =======================
// Tutor Routes
// =======================
Route::prefix('tutor')->name('tutor.')->middleware('role:tutor')->group(function () {
    // DASHBOARD
    Route::get('/', [DashboardController::class, 'tutorDashboard'])->name('dashboard');
    Route::get('/salary-report', [DashboardController::class, 'getSalaryReport'])->name('dashboard.report');

    // SCHEDULE
    Route::get('/schedule', [ScheduleController::class, 'tutorReportIndex'])->name('schedule.index');
    Route::post('/schedule', [ScheduleController::class, 'tutorStore'])->name('schedule.store');
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'tutorEdit'])->name('schedule.edit');
    Route::put('/schedule/{id}', [ScheduleController::class, 'tutorUpdate'])->name('schedule.update');

    // Attendance
    Route::get('/schedule/{id}/attendance', [AttendanceController::class, 'tutorIndex'])->name('schedule.attendance.index');
    Route::post('/schedule/{id}/attendance', [AttendanceController::class, 'tutorStore'])->name('schedule.attendance.store');
    Route::put('/schedule/{id}/attendance', [AttendanceController::class, 'tutorUpdate'])->name('schedule.attendance.update');
    Route::delete('/schedule/{scheduleId}/attendance/{id}', [AttendanceController::class, 'tutorDestroy'])->name('schedule.attendance.destroy');

    // REPORT
    Route::get('/report', [ReportController::class, 'tutorReportIndex'])->name('report.index');

    // Grade
    Route::get('/report/{id}/grade', [StudentProgressController::class, 'tutorIndex'])->name('report.grade.index');
    Route::post('/report/grade', [StudentProgressController::class, 'tutorStore'])->name('report.grade.store');
    Route::put('/report/{id}/grade', [StudentProgressController::class, 'tutorUpdate'])->name('report.grade.update');
    Route::delete('/report/{scheduleId}/grade/{id}', [StudentProgressController::class, 'tutorDestroy'])->name('report.grade.destroy');

    // Lesson Plan
    Route::get('/report/{id}/lesson-plan', [LessonPlanController::class, 'tutorIndex'])->name('report.lesson-plan.index');
    Route::put('/report/{id}/lesson-plan', [LessonPlanController::class, 'tutorUpdate'])->name('report.lesson-plan.update');

    // Salary
    Route::get('/salary', [BillHistoryController::class, 'tutorViewSalary'])->name('salary.index');
    Route::get('/salary/receipt/{id}', [BillHistoryController::class, 'tutorSalaryReceipt'])->name('salary.receipt');
    // Profile
    Route::get('/profile', [ProfileController::class, 'showTutorProfile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateTutorProfile'])->name('profile.update');
    Route::put('/profile/education', [ProfileController::class, 'updateTutorEducation'])->name('profile.education.update');
});

// =======================
// Guardian Routes
// =======================
Route::prefix('guardian')->name('guardian.')->middleware('role:guardian')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'guardianDashboard'])->name('dashboard');
    Route::post('/children', [StudentGuardianController::class, 'guardianAddChild'])->name('dashboard.addChild');

    // report
    Route::get('/report', [StudentController::class, 'guardianReport'])->name('report.index');
    Route::get('/report/{id}', [StudentController::class, 'guardianViewReport'])->name('report.view');
    Route::get('/report/{id}/edit', [StudentController::class, 'guardianEditReport'])->name('report.edit');
    Route::put('/report/{id}', [StudentController::class, 'guardianUpdateReport'])->name('report.update');
    // bill
    Route::get('/student-bill', [BillHistoryController::class, 'guardianBillView'])->name('bill.index');
    Route::get('/student-bill/pay/{id}', [ToyyibPayController::class, 'createBill'])->name('bill.toyyibpay.create');
    Route::any('/student-bill/toyyibpay/return', [ToyyibPayController::class, 'return'])->name('bill.toyyibpay.return');
    // Route::any('/student-bill/toyyibpay/callback', [ToyyibPayController::class, 'callback'])->name('bill.toyyibpay.callback');
    // lihat resit bayaran
    Route::get('/student-bill/{id}/receipt', [BillHistoryController::class, 'guardianBillReceipt'])->name('bill.receipt');

    // profile
    Route::get('/profile', [ProfileController::class, 'showGuardianProfile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateGuardianProfile'])->name('profile.update');
});
