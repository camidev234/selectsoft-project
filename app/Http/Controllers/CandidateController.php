<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillsCandidateRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\applications;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $experiencies = $user->experiences;
        $educations = $user->educations;
        $supports = $user->supports;

        // Candidate::where('user_id', $user->id)->first();
        $candidate = $user->candidate;

        $applications = applications::where('candidate_id', $candidate->id)->orderBy('created_at', 'desc')->get();

        $profile = $candidate->occupational_profile;

        if ($profile == 'NULL') {
            $profile = 'Perfil Sin Completar';
        }

        if (empty($experiencies)) {
            $countExperiencies = 0;
        } else {
            $countExperiencies = count($experiencies);
        }

        if (empty($educations)) {
            $countEducations = 0;
        } else {
            $countEducations = count($educations);
        }

        if (empty($supports)) {
            $countSupports = 0;
        } else {
            $countSupports = count($supports);
        }

        return view('/user/indexUser', [
            'user' => $user,
            'role_id' => $role_id,
            'experiences' => $countExperiencies,
            'educations' => $countEducations,
            'supports' => $countSupports,
            'profile' => $profile,
            'applications' => $applications
        ]);
    }

    public function readCurriculum(): View
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $candidate = $user->candidate;
        if ($candidate->occupational_profile == 'NULL') {
            $profile = 'Perfil sin completar';
        } else {
            $profile = $candidate->occupational_profile;
        }
        if ($candidate->skills == null) {
            $skills = 'No hay habilidades para motsrar';
        } else {
            $skills = $candidate->skills;
        }
        $educations = $user->educations;
        $experiences = $user->experiences;
        return view('/user/curriculum', [
            'user' => $user,
            'role_id' => $role_id,
            'candidate' => $candidate,
            'profile' => $profile,
            'skills' => $skills,
            'educations' => $educations,
            'experiencies' => $experiences
        ]);
    }

    public function editProfile(Candidate $candidate)
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('user/updateProfile', [
            'user' => $user,
            'role_id' => $role_id,
            'candidate' => $candidate
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request, Candidate $candidate)
    {

        $candidate->occupational_profile = $request->occupational_profile;
        $candidate->curriculum_title = $request->curriculum_title;
        $candidate->save();

        return redirect()->route('candidate.curriculum');
    }

    public function updateSkills(SkillsCandidateRequest $request, Candidate $candidate): RedirectResponse
    {
        $candidate->skills = $request->skills;

        $candidate->save();

        return redirect()->route('candidate.curriculum');
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
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
