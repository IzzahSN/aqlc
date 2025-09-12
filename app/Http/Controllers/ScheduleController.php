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
    public function index()
    {
        $query = ClassModel::with('tutor');

        // Expand setiap kelas jadi slot 30 minit
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

        // Ambil min & max masa ikut semua kelas
        $minStart = $classes->min(function ($c) {
            return \Carbon\Carbon::createFromFormat('H:i', explode('-', $c->slot)[0]);
        });
        $maxEnd = $classes->max(function ($c) {
            return \Carbon\Carbon::createFromFormat('H:i', explode('-', $c->slot)[1]);
        });

        // Generate slot dari min → max
        $timeSlots = [];
        $current = $minStart->copy();
        while ($current < $maxEnd) {
            $next = $current->copy()->addMinutes(30);
            $timeSlots[] = $current->format('H:i') . '-' . $next->format('H:i');
            $current = $next;
        }

        // Susun ikut hari & slot masa
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $timetable = [];
        foreach ($days as $day) {
            foreach ($timeSlots as $slot) {
                $timetable[$day][$slot] = $classes->filter(function ($c) use ($day, $slot) {
                    return $c->day == $day && $c->slot == $slot;
                });
            }
        }

        return view('admin.class.schedule', compact('timetable', 'days', 'timeSlots'));
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
