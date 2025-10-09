<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Schedule;
use App\Models\Tutor;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //index
    public function index()
    {
        $schedules = Schedule::select('schedules.*')
            ->join('class_models', 'schedules.class_id', '=', 'class_models.class_id')
            ->with('class.tutor')
            ->orderBy('schedules.date')
            ->orderBy('class_models.day')
            ->orderBy('class_models.start_time')
            ->get();

        // select semua tutor
        $tutors = Tutor::where('status', 'active')->get();

        // select semua class  ->orderBy('day') ->orderBy('start_time')
        $classes = ClassModel::with('tutor')->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('admin.report.index', compact('schedules', 'classes', 'tutors'));
    }
}
