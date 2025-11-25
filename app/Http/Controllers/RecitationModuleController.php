<?php

namespace App\Http\Controllers;

use App\Models\RecitationModule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RecitationModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = RecitationModule::all();
        return view('admin.report.module', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'recitation_name' => 'required|string|max:255',
            'level_type' => 'required|string|max:255',
            'first_page' => 'required|integer|min:1',
            'end_page' => 'required|integer|min:1|gte:first_page',
            'badge' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:2048', // max 2MB
        ]);

        // Handle file upload
        $badgePath = null;
        if ($request->hasFile('badge')) {
            $ext = $request->file('badge')->getClientOriginalExtension(); // ambil extension asal;
            $fileName = 'badge_' . Str::slug($request->recitation_name) . '_' . time() . '.' . $ext;
            $badgePath = $request->file('badge')->storeAs('badges', $fileName, 'public');
        }

        RecitationModule::create([
            'recitation_name' => $request->recitation_name,
            'level_type' => $request->level_type,
            'first_page' => $request->first_page,
            'end_page' => $request->end_page,
            'badge' => $badgePath ?? null,
        ]);

        // return redirect()->back()->with('success', 'Recitation Module created successfully.')->with('closeModalAdd', true);
        return redirect()->back()->with('success', 'Modul Bacaan berjaya ditambah.')->with('closeModalAdd', true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $module = RecitationModule::findOrFail($id);
        return response()->json($module);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $module = RecitationModule::findOrFail($id);

        $request->validate([
            'recitation_name' => 'required|string|max:255',
            'level_type' => 'required|string|max:255',
            'first_page' => 'required|integer|min:1',
            'end_page' => 'required|integer|min:1|gte:first_page',
            'badge' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:2048', // max 2MB
        ]);

        // Handle file upload
        if ($request->hasFile('badge')) {
            $ext = $request->file('badge')->getClientOriginalExtension(); // ambil extension asal;
            $fileName = 'badge_' . Str::slug($request->recitation_name) . '_' . time() . '.' . $ext;
            $badgePath = $request->file('badge')->storeAs('badges', $fileName, 'public');
            $module->badge = $badgePath;
        }

        $module->recitation_name = $request->recitation_name;
        $module->level_type = $request->level_type;
        $module->first_page = $request->first_page;
        $module->end_page = $request->end_page;
        $module->save();

        // return redirect()->back()->with('success', 'Recitation Module updated successfully.')->with('closeModalEdit', true);
        return redirect()->back()->with('success', 'Modul Bacaan berjaya dikemaskini.')->with('closeModalEdit', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $module = RecitationModule::findOrFail($id);
        $module->delete();

        // return redirect()->back()->with('success', 'Recitation Module deleted successfully.');
        return redirect()->back()->with('success', 'Modul Bacaan berjaya dipadam.');
    }
}
