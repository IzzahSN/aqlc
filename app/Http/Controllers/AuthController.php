<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Handle login logic here
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:12',
            'role' => 'required|string|in:guardian,tutor',
        ]);

        if ($request->role === 'guardian') {
            $user = Guardian::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['success' => false, 'message' => 'Invalid guardian credentials']);
            }

            session([
                'user_id' => $user->guardian_id,
                'role' => 'guardian',
                'fullname' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'username' => $user->first_name,
                'profile' => $user->profile,
            ]);

            return response()->json([
                'success' => true,
                'redirect_url' => route('guardian.dashboard'),
                'message' => 'Welcome back, Guardian!'
            ]);
        }

        if ($request->role === 'tutor') {
            $user = Tutor::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['success' => false, 'message' => 'Invalid tutor credentials']);
            }

            session([
                'user_id' => $user->tutor_id,
                'role'    => strtolower($user->role), // simpan admin/tutor
                'fullname' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'username' => $user->username,
                'profile' => $user->profile,
            ]);

            $redirectUrl = $user->role === 'Admin'
                ? route('admin.dashboard')
                : route('tutor.dashboard');

            return response()->json([
                'success' => true,
                'redirect_url' => $redirectUrl,
                'message' => 'Login successful!'
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid role selected']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'email'        => 'required|email|unique:guardians,email',
            'phone_number' => 'required|string|max:15',
            'ic_number'    => 'required|string|size:12|unique:guardians,ic_number',
        ]);

        // Auto hash password dari IC number
        $hashedPassword = Hash::make($request->ic_number);

        Guardian::create([
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'ic_number'    => $request->ic_number,
            'password'     => $hashedPassword,
            'status'       => 'active',
        ]);
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return response()->json([
            'success' => true,
            'redirect_url' => route('home'),
            'message' => 'You have been successfully logged out.'
        ]);
    }
}
