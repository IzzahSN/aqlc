<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Package;
use App\Models\Tutor;
use Illuminate\Http\Request;

class ClassModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassModel::all();
        // hanya ambil tutor yang active
        $tutors = Tutor::where('status', 'active')->get();

        // select semua package
        $packages = Package::all();
        return view('admin.class.class', compact('classes', 'tutors', 'packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'room' => 'required|string|max:255',
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'status' => 'required|in:Available,Full',
            'tutor_id' => 'required|exists:tutors,tutor_id',
            'package_id' => 'required|exists:packages,package_id',
        ]);

        ClassModel::create([
            'class_name' => $request->class_name,
            'capacity' => $request->capacity,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'room' => $request->room,
            'day' => $request->day,
            'status' => $request->status,
            'tutor_id' => $request->tutor_id,
            'package_id' => $request->package_id,
        ]);

        return redirect()->back()->with('success', 'Class created successfully!')->with('closeModal', true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassModel $classModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassModel $classModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassModel $classModel)
    {
        //
    }
}
