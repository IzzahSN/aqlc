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

        // ❗ kalau tiada kelas, terus return view kosong
        if ($classes->isEmpty()) {
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            return view('admin.class.schedule', [
                'timetable' => [],
                'days' => $days,
                'timeSlots' => []
            ]);
        }

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

        //display all schedule ->orderBy('day') ->orderBy('start_time')
        $schedules = Schedule::with('class.tutor')->orderBy('date')->get();

        // select semua tutor
        $tutors = Tutor::where('status', 'active')->get();

        // select semua class  ->orderBy('day') ->orderBy('start_time')
        $classes = ClassModel::with('tutor')->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('admin.class.schedule', compact('timetable', 'days', 'timeSlots', 'schedules', 'classes', 'tutors'));
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
        $request->validate([
            'class_id' => 'required|exists:class_models,class_id',
            'date' => 'required|date',
            'tutor_id' => 'required|exists:tutors,tutor_id',
            'relief' => 'nullable|exists:tutors,tutor_id',
        ]);

        // Elak duplicate schedule pada tarikh sama
        $exists = Schedule::where('class_id', $request->class_id)
            ->whereDate('date', $request->date)
            ->exists();

        if ($exists) {
            return back()->with('error', 'This class already has a schedule on the selected date.')
                ->withInput();
        }

        $class = ClassModel::findOrFail($request->class_id);

        // Relief tak boleh sama dengan tutor asal
        if (!empty($request->relief) && $request->relief == $class->tutor_id) {
            return back()->with('error', 'Relief tutor cannot be the same as the main tutor.')
                ->withInput();
        }

        if (!empty($request->relief)) {
            // ✅ 1. Check kalau relief tutor ada class sebenar bertembung masa sama
            $teachingConflict = ClassModel::where('tutor_id', $request->relief)
                ->where('day', $class->day)
                ->where(function ($q) use ($class) {
                    $q->where(function ($query) use ($class) {
                        $query->where('start_time', '<', $class->end_time)
                            ->where('end_time', '>', $class->start_time);
                    });
                })
                ->exists();

            if ($teachingConflict) {
                return back()->with('error', 'Relief tutor has a conflict with their own class schedule.')
                    ->withInput();
            }

            // ✅ 2. Check kalau relief tutor dah relief kelas lain pada waktu sama
            $reliefConflict = Schedule::where('relief', $request->relief)
                ->whereDate('date', $request->date)
                ->whereHas('class', function ($q) use ($class) {
                    $q->where('day', $class->day)
                        ->where(function ($query) use ($class) {
                            $query->where('start_time', '<', $class->end_time)
                                ->where('end_time', '>', $class->start_time);
                        });
                })
                ->exists();

            if ($reliefConflict) {
                return back()->with('error', 'Relief tutor already assigned to another relief class that overlaps in time.')
                    ->withInput();
            }
        }

        // ✅ 3. Simpan jika semua okay
        Schedule::create([
            'class_id' => $request->class_id,
            'date' => $request->date,
            'tutor_id' => $request->tutor_id,
            'relief' => $request->relief,
        ]);

        return back()->with('success', 'Class schedule created successfully.')
            ->with('closeModalAdd', true);
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
