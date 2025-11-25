<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardians = Guardian::withCount('studentGuardians')->get();
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
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'ic_number' => 'required|string|max:12|unique:guardians,ic_number',
            'birth_date' => 'nullable|date',
            'age' => 'nullable|integer|min:18',
            'gender' => 'required|in:male,female',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|unique:guardians,email',
            'address' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
        // default password hash from ic_number
        $password = Hash::make($request->ic_number);
        // profile picture default null
        $profile = null;

        Guardian::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'ic_number' => $request->ic_number,
            'birth_date' => $request->birth_date,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $password,
            'profile' => $profile,
            'status' => $request->status,
        ]);

        // return redirect()->back()->with('success', 'Guardian added successfully!')->with('closeModalAdd', true);
        return redirect()->back()->with('success', 'Penjaga berjaya ditambahkan!')->with('closeModalAdd', true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guardian = Guardian::findOrFail($id);
        return response()->json($guardian);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'age' => 'nullable|integer|min:18',
            'gender' => 'required|in:male,female',
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $guardian->update($request->all());
        // return redirect()->back()->with('success', 'Guardian updated successfullly!')->with('closeModalEdit', true);
        return redirect()->back()->with('success', 'Penjaga berjaya dikemaskini!')->with('closeModalEdit', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guardian = Guardian::find($id);
        // cannot delete guardian if has student guardians
        if ($guardian->studentGuardians()->count() > 0) {
            // return redirect()->route('admin.guardian.index')->with('error', 'Cannot delete guardian with associated students.');
            return redirect()->route('admin.guardian.index')->with('error', 'Tidak boleh membuang penjaga yang mempunyai pelajar berkaitan.');
        }
        $guardian->delete();
        // return redirect()->route('admin.guardian.index')->with('success', 'Guardian deleted successfully.');
        return redirect()->route('admin.guardian.index')->with('success', 'Penjaga berjaya dibuang.');
    }
}
