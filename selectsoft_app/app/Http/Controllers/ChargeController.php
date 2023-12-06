<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChargeRequest;
use App\Models\Charge;
use App\Models\Company;
use App\Models\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        $charges = $company->charges;

        return view('/charge/index', [
            'user' => $user,
            'role_id' => $role_id,
            'charges' => $charges,
            'company' => $company
        ]);

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
        $user = Auth::user();
        $recruiter = $user->recruiter;
        $company = $recruiter->company;
        $newCharge = new Charge();

        $newCharge->charge = $request->charge;
        $newCharge->occupation_id = $request->occupation_id;
        $newCharge->company_id = $company->id;

        $newCharge->save();

        return redirect()->route('charges.index', ['company' => $company]);
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
    public function edit(Charge $charge, Company $company)
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        $currentOccupation = $charge->occupation;

        $occupations = Occupation::where('id', '!=', $currentOccupation->id)->get();

        return view('/charge/update', [
            'user' => $user,
            'role_id' => $role_id,
            'company' => $company,
            'occupations' => $occupations,
            'charge' => $charge
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChargeRequest $request, Charge $charge, Company $company)
    {
        $charge->charge = $request->charge;
        $charge->occupation_id = $request->occupation_id;

        $charge->save();

        return redirect()->route('charges.index', ['company' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Charge $charge)
    {
        $charge->delete();

        return redirect()->back();
    }
}
