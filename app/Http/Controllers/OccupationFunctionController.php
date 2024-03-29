<?php

namespace App\Http\Controllers;

use App\Http\Requests\FunctionOccupationRequest;
use App\Models\Charge;
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
    public function create(Charge $charge) :View
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/occupations_function/create', [
            'user' => $user,
            'charge' => $charge,
            'role_id' => $role_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FunctionOccupationRequest $request, Charge $charge) :RedirectResponse
    {
        $newFunction = new Occupation_function();

        $newFunction->function = $request->function;
        $newFunction->charge_id = $charge->id;

        $newFunction->save();

        return redirect()->route('charge.show', ['charge' => $charge]);
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
    public function edit(Occupation_function $occupation_function, Charge $charge) :View
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/occupations_function/update', [
            'user' => $user,
            'role_id' => $role_id,
            'function' => $occupation_function,
            'charge' => $charge
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FunctionOccupationRequest $request, Occupation_function $occupation_function, Charge $charge)
    {
        $occupation_function->function = $request->function;

        $occupation_function->save();

        return redirect()->route('charge.show', ['charge' => $charge]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Occupation_function $occupation_function)
    {
        $occupation_function->delete();

        return redirect()->back();
    }
}
