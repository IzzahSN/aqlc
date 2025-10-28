<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

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
}
