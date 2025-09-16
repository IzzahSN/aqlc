<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutors = Tutor::withCount('classes')->get();
        $totalTutors = Tutor::count();
        $activeTutors = Tutor::where('status', 'active')->count();
        $inactiveTutors = Tutor::where('status', 'inactive')->count();

        return view('admin.record.tutor', compact('tutors', 'totalTutors', 'activeTutors', 'inactiveTutors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'ic_number' => 'required|string|max:12|unique:tutors,ic_number',
            'birth_date' => 'required|date',
            'age' => 'required|integer|min:18',
            'gender' => 'required|in:male,female',
            'address' => 'nullable|string',
            'email' => 'required|email|unique:tutors,email',
            'phone_number' => 'required|string|max:15',
            'university' => 'required|string|max:255',
            'programme' => 'required|string|max:255',
            'grade' => 'required|numeric|between:0,4.00',
            'resume' => 'nullable|mimes:pdf|max:2048', // max 2MB
            'bg_description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:Tutor,Admin',
        ]);

        // password hash from ic_number
        $password = Hash::make($request->ic_number);
        // profile picture default null
        $profile = null;

        // Handle file upload
        if ($request->hasFile('resume')) {
            $ext = $request->file('resume')->getClientOriginalExtension(); // ambil extension asal
            $fileName = 'resume_' . Str::slug($request->first_name) . '_' . time() . '.' . $ext;
            $resumePath = $request->file('resume')->storeAs('resumes', $fileName, 'public');
        } else {
            return back()->withErrors(['resume' => 'Resume upload failed.'])->withInput();
        }


        // Simpan data tutor ke database
        Tutor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'ic_number' => $request->ic_number,
            'birth_date' => $request->birth_date,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'university' => $request->university,
            'programme' => $request->programme,
            'grade' => $request->grade,
            'resume' => $resumePath,
            'bg_description' => $request->bg_description,
            'status' => $request->status,
            'role' => $request->role,
            'password' => $password,
            'profile' => $profile,
        ]);

        return redirect()->back()->with('success', 'Tutor added successfully!')->with('closeModalAdd', true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tutor = Tutor::findOrFail($id);
        return response()->json($tutor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tutor = Tutor::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'age' => 'required|integer|min:18',
            'gender' => 'required|in:male,female',
            'address' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'university' => 'required|string|max:255',
            'programme' => 'required|string|max:255',
            'grade' => 'required|numeric|between:0,4.00',
            'resume' => 'nullable|mimes:pdf|max:2048', // max 2MB
            'bg_description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:Tutor,Admin',
        ]);

        // define $data awal-awal
        $data = $request->except('resume');

        // Handle file upload only if new file uploaded
        if ($request->hasFile('resume')) {
            $ext = $request->file('resume')->getClientOriginalExtension();
            $fileName = 'resume_' . Str::slug($request->first_name) . '_' . time() . '.' . $ext;
            $resumePath = $request->file('resume')->storeAs('resumes', $fileName, 'public');

            $data['resume'] = $resumePath;
        }

        $tutor->update($data);

        return redirect()->back()->with('success', 'Tutor updated successfully')->with('closeModalEdit', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tutor = Tutor::findOrFail($id);

        // Check kalau tutor ada class
        if ($tutor->classes()->exists()) {
            return redirect()->route('admin.tutor.index')
                ->with('error', 'Cannot delete tutor. This tutor is already assigned to a class.');
        }

        $tutor->delete();

        return redirect()->route('admin.tutor.index')
            ->with('success', 'Tutor deleted successfully.');
    }
}
