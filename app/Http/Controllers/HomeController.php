<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Tutor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // show all packages active
        $packages = Package::where('status', 'active')->get();

        return view('guest.home', compact('packages'));
    }

    public function profile()
    {
        // show all tutor who are active
        $tutors = Tutor::where('status', 'active')->get();

        return view('guest.profile', compact('tutors'));
    }

    public function contact()
    {
        return view('guest.contact');
    }
}
