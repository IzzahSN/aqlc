<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\RecitationModule;
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
        return view('admin.report.achievement', compact('achievements', 'totalFinishedIqra', 'totalFinishedQuran', 'totalStudents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        //
    }
}
