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
        return view('admin.record.tutor', compact('tutors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutor $tutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tutor $tutor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
