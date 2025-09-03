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
                return back()->withErrors(['email' => 'Invalid guardian credentials']);
            }

            session([
                'user_id' => $user->guardian_id,
                'role' => 'guardian',
                'name' => $user->first_name . ' ' . $user->last_name,
            ]);

            return redirect()->route('guardian.dashboard');
        }

        if ($request->role === 'tutor') {
            $user = Tutor::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return back()->withErrors(['email' => 'Invalid tutor credentials']);
            }

            session([
                'user_id' => $user->tutor_id,
                'role'    => strtolower($user->role), // simpan admin/tutor
                'name' => $user->first_name . ' ' . $user->last_name,
            ]);

            if ($user->role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('tutor.dashboard');
            }
        }

        return back()->withErrors(['role' => 'Invalid role selected']);
    }

    public function register(Request $request)
    {
        // Handle registration logic here
        return response()->json(['message' => 'Registration successful']);
    }
}
