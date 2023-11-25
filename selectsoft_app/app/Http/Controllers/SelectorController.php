<?php

namespace App\Http\Controllers;

use App\Models\Selector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/selector/indexSelector', [
            'user' => $user,
            'role_id' => $role_id
        ]);
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
    public function show(Selector $selector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Selector $selector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Selector $selector)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Selector $selector)
    {
        //
    }
}
