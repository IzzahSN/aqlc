<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardians = Guardian::all();
        $activeGuardians = Guardian::where('status', 'active')->count();
        $inactiveGuardians = Guardian::where('status', 'inactive')->count();
        $totalGuardians = Guardian::count();
        return view('admin.record.guardian', compact('guardians', 'totalGuardians', 'activeGuardians', 'inactiveGuardians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardian $guardian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guardian $guardian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guardian = Guardian::find($id);
        $guardian->delete();
        return redirect()->route('admin.guardian.index')->with('success', 'Guardian deleted successfully.');
    }
}
