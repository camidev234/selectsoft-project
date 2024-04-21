<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonExperiencieRequest;
use App\Models\Person_experience;
use App\Models\User;
use App\Models\Work_area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $experiencies = $user->experiences;

        return view('/person_exp/indexExperiencies', [
            'role_id' => $role_id,
            'user' => $user,
            'experiencies' => $experiencies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        return view('/person_exp/create', [
            'role_id' => $role_id,
            'user' => $user,
            'work_areas' => Work_area::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonExperiencieRequest $request)
    {
        $newExperiencie = new Person_experience();

        $newExperiencie->company_experience = $request->company_experience;
        $newExperiencie->months_experience = $request->months_experience;
        $newExperiencie->functions = $request->functions;
        $user = Auth::user();
        $newExperiencie->user_id = $user->id;
        $newExperiencie->work_area_id = $request->work_area_id;
        $newExperiencie->job = $request->job;

        $newExperiencie->save();

        return redirect()->route('exp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person_experience $person_experience)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person_experience $person_experience)
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/person_exp/edit', [
            'user' => $user,
            'role_id' => $role_id,
            'experience' => $person_experience,
            'work_areas' => Work_area::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonExperiencieRequest $request, Person_experience $person_experience)
    {
        $person_experience->company_experience = $request->company_experience;
        $person_experience->months_experience = $request->months_experience;
        $person_experience->functions = $request->functions;
        $person_experience->work_area_id = $request->work_area_id;
        $person_experience->job = $request->job;

        $person_experience->save();

        return redirect()->route('exp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person_experience $person_experience)
    {
        $person_experience->delete();

        return redirect()->route('exp.index');
    }
}
