<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Schedule;
use App\Models\Tutor;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tutorId = $request->get('tutor_id');

        $query = ClassModel::with('tutor');

        if ($tutorId) {
            $query->where('tutor_id', $tutorId);
        }

        $classes = $query->get()->flatMap(function ($c) {
            $slots = [];

            $start = \Carbon\Carbon::parse($c->start_time);
            $end   = \Carbon\Carbon::parse($c->end_time);

            while ($start < $end) {
                $next = $start->copy()->addMinutes(30);

                $cCopy = clone $c; // salin object asal
                $cCopy->slot = $start->format('H:i') . '-' . $next->format('H:i');
                $slots[] = $cCopy;

                $start = $next;
            }

            return $slots;
        });


        // Susun ikut hari & slot masa
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $timeSlots = [
            '09:00-09:30',
            '09:30-10:00',
            '10:00-10:30',
            '10:30-11:00',
            '13:00-13:30',
            '13:30-14:00',
            '19:00-19:30',
            '19:30-20:00',
            '20:00-20:30',
            '20:30-21:00',
            '21:00-21:30',
            '21:30-22:00'
        ];

        // Array untuk isi timetable
        $timetable = [];
        foreach ($days as $day) {
            foreach ($timeSlots as $slot) {
                $timetable[$day][$slot] = $classes->filter(function ($c) use ($day, $slot) {
                    return $c->day == $day && $c->slot == $slot;
                });
            }
        }


        $tutors = Tutor::all();
        return view('admin.class.schedule', compact('timetable', 'days', 'timeSlots', 'tutors'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function attendance()
    {
        return view('admin.class.attendance');
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
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
