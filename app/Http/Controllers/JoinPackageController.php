<?php

namespace App\Http\Controllers;

use App\Models\JoinClass;
use App\Models\JoinPackage;
use App\Models\Package;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * Show the form for editing the specified resource.
     */
    public function edit($studentId, $id)
    {
        $student = Student::with(['joinPackage.package', 'classes'])->findOrFail($studentId);
        $joinPackage = JoinPackage::with('package')
            ->where('student_id', $studentId)
            ->where('package_id', $id)
            ->firstOrFail();
        // Ambil class_id yang sudah dipilih student
        $selectedClasses = $student->classes->pluck('class_id')->map(fn($v) => (int)$v)->toArray();

        return view('admin.record.student_edit_package', compact('student', 'selectedClasses', 'joinPackage'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $studentId, $id)
    {
        $request->validate([
            'class_ids' => 'required|array',
            'class_ids.*' => 'exists:class_models,class_id',
        ]);

        $student = Student::findOrFail($studentId);

        // replace kelas lama dengan kelas baru sekali jalan
        $student->classes()->sync($request->class_ids);

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Student package classes updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($studentId, $id)
    {
        // Pastikan student dan package wujud
        $student = Student::findOrFail($studentId);
        $package = Package::findOrFail($id);
        //delete student dari join_classes dan join_packages
        DB::transaction(function () use ($studentId, $id) {
            JoinClass::where('student_id', $studentId)->delete();
            JoinPackage::where('student_id', $studentId)->where('package_id', $id)->delete();
        });

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Student package and associated classes removed successfully.');
    }
}
