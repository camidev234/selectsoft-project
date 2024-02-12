<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education_person;
use App\Models\study_level;
use App\Models\study_status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $educations = $user->educations;

        return view('/educations_person/indexEducations' , [
            'educations' => $educations,
            'role_id' => $role_id,
            'user' => $user,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $study_levels = study_level::all();
        $study_statuses = study_status::all();

        return view('/educations_person/create', [
            'study_levels' => $study_levels,
            'statuses' => $study_statuses,
            'role_id' => $role_id,
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationRequest $request)
    {
        $user = Auth::user();
        $newEducation = new Education_person();

        $newEducation->shcool_name = $request->shcool_name;
        $newEducation->obtained_title = $request->obtained_title;
        $newEducation->study_level_id = $request->study_level_id;
        $newEducation->study_status_id = $request->study_status_id;
        $newEducation->user_id = $user->id;

        $newEducation->save();

        return redirect()->route('educations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education_person $education_person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education_person $education_person)
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $study_levels = study_level::all();
        $study_statuses = study_status::all();

        return view('/educations_person/edit', [
            'study_levels' => $study_levels,
            'statuses' => $study_statuses,
            'role_id' => $role_id,
            'user' => $user,
            'education' => $education_person
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education_person $education_person)
    {
        $education_person->shcool_name = $request->shcool_name;
        $education_person->obtained_title = $request->obtained_title;
        $education_person->study_level_id = $request->study_level_id;
        $education_person->study_status_id = $request->study_status_id;

        $education_person->save();

        return redirect()->route('educations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education_person $education_person)
    {
        $education_person->delete();

        return redirect()->route('educations.index');
    }
}
