<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function showAdminProfile()
    {
        // Logic to show user profile
        $adminID = session('user_id');
        // Retrieve admin profile data using $adminID
        $adminProfile = Tutor::find($adminID);
        return view('admin.profile', compact('adminProfile'));
    }

    public function updateAdminProfile(Request $request)
    {
        // Logic to update user profile
        $adminID = session('user_id');
        $adminProfile = Tutor::find($adminID);

        // Validate and update profile data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'age' => 'required|integer|min:18',
            'address' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->except('profile');

        if ($request->hasFile('profile')) {
            $ext = $request->file('profile')->getClientOriginalExtension();
            $fileName = 'profile_' . Str::slug($request->first_name) . '_' . time() . '.' . $ext;
            $profilePath = $request->file('profile')->storeAs('profiles', $fileName, 'public');
            $data['profile'] = $profilePath;

            // 💡 Refresh session supaya navbar terus update tanpa relogin
            session(['profile' => $profilePath]);
        }

        session([
            'username' => $request->username,
            'fullname' => $request->first_name . ' ' . $request->last_name,
        ]);


        $adminProfile->update($data);

        // return redirect()->back()->with('success', 'Admin updated personal details successfully!')->with('closeModalEdit', true);
        return redirect()->back()->with('success', 'Admin berjaya mengemaskini butiran peribadi!')->with('closeModalEdit', true);
    }

    public function updateAdminEducation(Request $request)
    {
        // Logic to update user education background
        $adminID = session('user_id');
        $adminProfile = Tutor::find($adminID);

        // Validate and update education background data
        $request->validate([
            'university' => 'required|string|max:255',
            'programme' => 'required|string|max:255',
            'grade' => 'required|numeric|between:0,4.00',
            'resume' => 'nullable|mimes:pdf|max:2048', // max 2MB
            'bg_description' => 'nullable|string',
        ]);

        $data = $request->except('resume');

        if ($request->hasFile('resume')) {
            $ext = $request->file('resume')->getClientOriginalExtension();
            $fileName = 'resume_' . Str::slug($adminProfile->first_name) . '_' . time() . '.' . $ext;
            $resumePath = $request->file('resume')->storeAs('resumes', $fileName, 'public');
            $data['resume'] = $resumePath;
        }

        $adminProfile->update($data);

        // return redirect()->back()->with('success', 'Admin updated education background successfully!')->with('closeModalEdit', true);
        return redirect()->back()->with('success', 'Admin berjaya mengemaskini latar belakang pendidikan!')->with('closeModalEdit', true);
    }

    public function showTutorProfile()
    {
        // Logic to show tutor profile
        $tutorID = session('user_id');
        // Retrieve tutor profile data using $tutorID
        $tutorProfile = Tutor::find($tutorID);
        return view('tutor.profile', compact('tutorProfile'));
    }

    public function updateTutorProfile(Request $request)
    {
        // Logic to update tutor profile
        $tutorID = session('user_id');
        $tutorProfile = Tutor::find($tutorID);

        // Validate and update profile data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'age' => 'required|integer|min:18',
            'address' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->except('profile');

        if ($request->hasFile('profile')) {
            $ext = $request->file('profile')->getClientOriginalExtension();
            $fileName = 'profile_' . Str::slug($request->first_name) . '_' . time() . '.' . $ext;
            $profilePath = $request->file('profile')->storeAs('profiles', $fileName, 'public');
            $data['profile'] = $profilePath;

            // 💡 Refresh session supaya navbar terus update tanpa relogin
            session(['profile' => $profilePath]);
        }

        session([
            'username' => $request->username,
            'fullname' => $request->first_name . ' ' . $request->last_name,
        ]);

        $tutorProfile->update($data);

        // return redirect()->back()->with('success', 'Tutor updated personal details successfully!')->with('closeModalEdit', true);
        return redirect()->back()->with('success', 'Tutor berjaya mengemaskini butiran peribadi!')->with('closeModalEdit', true);
    }

    public function updateTutorEducation(Request $request)
    {
        // Logic to update tutor education background
        $tutorID = session('user_id');
        $tutorProfile = Tutor::find($tutorID);

        // Validate and update education background data
        $request->validate([
            'university' => 'required|string|max:255',
            'programme' => 'required|string|max:255',
            'grade' => 'required|numeric|between:0,4.00',
            'resume' => 'nullable|mimes:pdf|max:2048', // max 2MB
            'bg_description' => 'nullable|string',
        ]);

        $data = $request->except('resume');

        if ($request->hasFile('resume')) {
            $ext = $request->file('resume')->getClientOriginalExtension();
            $fileName = 'resume_' . Str::slug($tutorProfile->first_name) . '_' . time() . '.' . $ext;
            $resumePath = $request->file('resume')->storeAs('resumes', $fileName, 'public');
            $data['resume'] = $resumePath;
        }

        $tutorProfile->update($data);

        // return redirect()->back()->with('success', 'Tutor updated education background successfully!')->with('closeModalEdit', true);
        return redirect()->back()->with('success', 'Tutor berjaya mengemaskini latar belakang pendidikan!')->with('closeModalEdit', true);
    }

    public function showGuardianProfile()
    {
        $guardianID = session('user_id');
        $guardianProfile = Guardian::find($guardianID);
        return view('guardian.profile', compact('guardianProfile'));
    }

    public function updateGuardianProfile(Request $request)
    {
        $guardianID = session('user_id');
        $guardianProfile = Guardian::find($guardianID);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'age' => 'required|integer|min:18',
            'address' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->except('profile');

        if ($request->hasFile('profile')) {
            $ext = $request->file('profile')->getClientOriginalExtension();
            $fileName = 'profile_' . Str::slug($request->first_name) . '_' . time() . '.' . $ext;
            $profilePath = $request->file('profile')->storeAs('profiles', $fileName, 'public');
            $data['profile'] = $profilePath;

            session(['profile' => $profilePath]);
        }

        session([
            'username' => $request->first_name,
            'fullname' => $request->first_name . ' ' . $request->last_name,
        ]);

        $guardianProfile->update($data);

        // return redirect()->back()->with('success', 'Guardian updated personal details successfully!')->with('closeModalEdit', true);
        return redirect()->back()->with('success', 'Penjaga berjaya mengemaskini butiran peribadi!')->with('closeModalEdit', true);
    }
}
