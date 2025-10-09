<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //index
    public function index()
    {
        return view('admin.report.index');
    }
}
