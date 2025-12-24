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
            ->orderByDesc('schedules.date')
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

    public function tutorReportIndex()
    {
        $tutorId = session('user_id');
        $tutor = Tutor::with('classes')->findOrFail($tutorId);
        // show all class tutor has attend and relief, if in table schedules relief is not null then get the id as tutor_id, if relief is null, get tutor_id from tutor_id field
        $schedules = Schedule::where(function ($query) use ($tutorId) {
            $query->where('tutor_id', $tutorId)->whereNull('relief');
        })->orWhere('relief', $tutorId)->with('class.package')
            // sort by date
            ->orderByDesc('date')
            ->get();

        // select semua class yang di assign ->orderBy('day') ->orderBy('start_time')
        $classes = ClassModel::where('tutor_id', $tutorId)
            ->orWhereHas('schedules', function ($query) use ($tutorId) {
                $query->where('relief', $tutorId);
            })
            ->with('tutor')
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('tutor.report', compact('schedules', 'classes', 'tutor'));
    }
}
