<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChargeRequest;
use App\Models\Charge;
use App\Models\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $occupations = Occupation::all();
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/charge/create', [
            'occupations' => $occupations,
            'user' => $user,
            'role_id' => $role_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChargeRequest $request)
    {
        $newCharge = new Charge();

        $newCharge->charge = $request->charge;
        $newCharge->occupation_id = $request->occupation_id;

        $newCharge->save();

        return redirect()->route('recruiter.index');
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
