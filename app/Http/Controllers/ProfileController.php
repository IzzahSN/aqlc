<?php

namespace App\Http\Controllers;

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
        }

        $adminProfile->update($data);

        return redirect()->back()->with('success', 'Admin updated personal details successfully!')->with('closeModalEdit', true);
    }
}
