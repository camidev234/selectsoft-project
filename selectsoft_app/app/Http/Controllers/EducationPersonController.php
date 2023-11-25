<?php

namespace App\Http\Controllers;

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
        //
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
    public function store(Request $request)
    {
        $user = Auth::user();
        $newEducation = new Education_person();

        $newEducation->shcool_name = $request->school_name;
        $newEducation->obtained_title = $request->obtained_title;
        $newEducation->studyLevel_id = $request->studyLevel_id;
        $newEducation->status_id = $request->status_id;
        $newEducation->user_id = $user->id;

        $newEducation->save();

        return redirect()->route('user.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education_person $education_person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education_person $education_person)
    {
        //
    }
}
