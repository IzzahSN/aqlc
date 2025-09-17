<?php

namespace App\Http\Controllers;

use App\Models\JoinClass;
use App\Models\JoinPackage;
use App\Models\Package;
use App\Models\Student;
use Illuminate\Http\Request;

class JoinPackageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $student = Student::with('joinPackage')->findOrFail($id);

        if ($student->joinPackage) {
            // Kalau dah ada package, redirect ke edit
            return redirect()->route('admin.student.package.edit', [
                'studentId' => $student->student_id,
                'id' => $student->joinPackage->package_id
            ])->with('warning', 'Student already has a package. Redirected to edit.');
        }
        $packages = Package::with('classes')->get();
        return view('admin.record.student_create_package', compact('packages', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $student = Student::with('joinPackage')->findOrFail($id);
        if ($student->joinPackage) {
            return redirect()->route('admin.student.package.edit', [
                'studentId' => $student->student_id,
                'id' => $student->joinPackage->package_id
            ])->with('warning', 'Student already has a package. Redirected to edit.');
        }

        $request->validate([
            'package_id' => 'required|exists:packages,package_id',
            'class_ids' => 'required|array',
        ]);

        $package = Package::findOrFail($request->package_id);

        // validate jumlah class ikut session_per_week
        if (count($request->class_ids) > $package->session_per_week) {
            return back()->withErrors([
                'class_ids' => "You can only select {$package->session_per_week} classes for this package."
            ])->withInput();
        }

        // insert join_packages
        JoinPackage::create([
            'student_id' => $student->student_id,
            'package_id' => $package->package_id,
        ]);

        // insert join_classes
        foreach ($request->class_ids as $classId) {
            JoinClass::create([
                'student_id' => $student->student_id,
                'class_id' => $classId,
            ]);
        }

        return redirect()->route('admin.student.index')
            ->with('success', 'Package and classes added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(JoinPackage $joinPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JoinPackage $joinPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JoinPackage $joinPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JoinPackage $joinPackage)
    {
        //
    }
}
