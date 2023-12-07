<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\Occupation_function;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OccupationFunctionController extends Controller
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
    public function create(Occupation $occupation) :View
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/occupations_function/create', [
            'user' => $user,
            'occupation' => $occupation,
            'role_id' => $role_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Occupation $occupation) :RedirectResponse
    {
        $newFunction = new Occupation_function();

        $newFunction->function = $request->function;
        $newFunction->occupation_id = $occupation->id;

        $newFunction->save();

        return redirect()->route('occupation.show', ['occupation' => $occupation]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Occupation_function $occupation_function)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Occupation_function $occupation_function)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Occupation_function $occupation_function)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Occupation_function $occupation_function)
    {
        //
    }
}
