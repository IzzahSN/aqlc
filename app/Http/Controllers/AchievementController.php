<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\RecitationModule;
use App\Models\SmsLog;
use App\Models\Student;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = Achievement::with(['student', 'recitationModule'])->latest()->get();
        $smsLogs = SmsLog::with(['achievement.student'])->latest()->get();

        // === AUTO CREATE SMS LOG JIKA BELUM ADA ===
        foreach ($achievements as $achievement) {

            if (!$achievement->smsLog) {

                $studentName = $achievement->student->first_name;
                $achievementTitle = $achievement->title;

                SmsLog::create([
                    'achievement_id' => $achievement->achievement_id,
                    'student_id'     => $achievement->student_id,
                    'message'        => "Tahniah! {$studentName} telah {$achievementTitle} 🎉",
                    'sms_status'     => 'Pending', // pending | sent | failed
                    'status_app'     => 'unread',
                ]);
            }
        }

        // Total Finished Iqra' (count achievements whose module is_complete_series = 1 and level_type = 'Iqra')
        $totalFinishedIqra = Achievement::whereHas('recitationModule', function ($q) {
            $q->where('is_complete_series', 1)
                ->where('level_type', 'Iqra');
        })->count();

        // Total Finished Quran
        $totalFinishedQuran = Achievement::whereHas('recitationModule', function ($q) {
            $q->where('is_complete_series', 1)
                ->where('level_type', 'Quran');
        })->count();

        // Kira total active students
        $totalStudents = Student::where('status', 'active')->count();

        // === Data untuk Chart ===
        // Ambil semua module Iqra dengan is_complete_series=0
        $iqraModules = RecitationModule::where('is_complete_series', 0)
            ->where('level_type', 'Iqra')
            ->get();

        $achievementsIqra = collect();
        foreach ($iqraModules as $module) {
            $count = Achievement::where('recitation_module_id', $module->recitation_module_id)
                ->distinct('student_id')
                ->count();
            $achievementsIqra[$module->recitation_module_id] = $count;
        }

        // Ambil semua module Quran dengan is_complete_series=0
        $quranModules = RecitationModule::where('is_complete_series', 0)
            ->where('level_type', 'Quran')
            ->get();

        $achievementsQuran = collect();
        foreach ($quranModules as $module) {
            $count = Achievement::where('recitation_module_id', $module->recitation_module_id)
                ->distinct('student_id')
                ->count();
            $achievementsQuran[$module->recitation_module_id] = $count;
        }

        // Labels
        $labelsIqra = $iqraModules->pluck('recitation_name', 'recitation_module_id');
        $labelsQuran = $quranModules->pluck('recitation_name', 'recitation_module_id');

        return view('admin.report.achievement', compact('achievements', 'smsLogs', 'totalFinishedIqra', 'totalFinishedQuran', 'totalStudents', 'achievementsIqra', 'achievementsQuran', 'labelsIqra', 'labelsQuran'));
    }

    public function viewCertificate($achievement_id)
    {
        $achievement = Achievement::findOrFail($achievement_id);
        $student = $achievement->student;


        // return path admin.report.certificate with achievement data
        return view('admin.report.certificate', compact('achievement', 'student'));
    }

    public function guardianViewCertificate($achievement_id)
    {
        $achievement = Achievement::findOrFail($achievement_id);
        $student = $achievement->student;
        // return path guardian.student.certificate with achievement data
        return view('guardian.certificate', compact('achievement', 'student'));
    }
}
