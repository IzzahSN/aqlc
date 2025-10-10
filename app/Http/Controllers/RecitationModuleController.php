<?php

namespace App\Http\Controllers;

use App\Models\RecitationModule;
use Illuminate\Http\Request;

class RecitationModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = RecitationModule::all();
        return view('admin.report.module', compact('modules'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RecitationModule $recitationModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecitationModule $recitationModule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecitationModule $recitationModule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecitationModule $recitationModule)
    {
        //
    }
}
