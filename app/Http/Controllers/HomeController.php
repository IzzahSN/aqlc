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

        // Find the package with the highest enrollment
        $highestEnrolledPackage = $packages->where('join_packages_count', $packages->max('join_packages_count'))->first();
        // Fallback: kalau semua 0, jangan tunjuk "Most popular"
        if ($highestEnrolledPackage && $highestEnrolledPackage->join_packages_count == 0) {
            $highestEnrolledPackage = null;
        }
        return view('guest.home', compact('packages', 'highestEnrolledPackage'));
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

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
