<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::withCount('joinPackages')->paginate(5);
        return view('admin.class.package', compact('packages'));
    }

    /**
     * Display the package report.
     */
    public function report()
    {
        $packages = Package::withCount('joinPackages')->get();
        return view('admin.class.package_report', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_name'         => 'required|string|max:255',
            'package_type'         => 'required|in:personal,group',
            'package_rate'         => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
            'unit'                 => 'required|in:per month,per session',
            'duration_per_sessions' => 'required|in:30 minutes,1 hour',
            'session_per_week'     => 'required|integer|min:1',
            'status'               => 'required|in:active,inactive',
            'details'              => 'nullable|string',
        ]);

        Package::create([
            'package_name'         => $request->package_name,
            'package_type'         => $request->package_type,
            'package_rate'         => $request->package_rate,
            'unit'                 => $request->unit,
            'duration_per_sessions' => $request->duration_per_sessions,
            'session_per_week'     => $request->session_per_week,
            'status'               => $request->status,
            'details'              => $request->details,
        ]);

        return redirect()->back()->with('success', 'Package added successfully!')->with('closeModalAdd', true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return response()->json($package);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $request->validate([
            'package_name'         => 'required|string|max:255',
            'package_type'         => 'required|in:personal,group',
            'package_rate'         => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
            'unit'                 => 'required|in:per month,per session',
            'duration_per_sessions' => 'required|in:30 minutes,1 hour',
            'session_per_week'     => 'required|integer|min:1',
            'status'               => 'required|in:active,inactive',
            'details'              => 'nullable|string',
        ]);

        $package->update($request->all());

        return redirect()->back()
            ->with('success', 'Package updated successfully!')
            ->with('closeModalEdit', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('admin.package.index')
            ->with('success', 'Package deleted successfully.');
    }
}
