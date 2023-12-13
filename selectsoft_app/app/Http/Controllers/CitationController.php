<?php

namespace App\Http\Controllers;

use App\Models\applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(applications $application)
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $selector = $user->selector;
        return view('/citations/create', [
            'user' => $user,
            'role_id' => $role_id,
            'selector' => $selector,
            'application' => $application
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
