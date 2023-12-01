<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $profile = $candidate->occupational_profile;

        if($profile == 'NULL'){
            $profile = 'Perfil Sin Completar';
        }

        if (empty($experiencies)) {
            $countExperiencies = 0;
        } else {
            $countExperiencies = count($experiencies);
        }

        if (empty($educations)){
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
            'profile' => $profile
        ]);
    }

    public function editProfile() {
        $user = Auth::user();
        $role_id = $user->role_id;

        $profile = $user->candidate->occupational_profile;

        return view('user/updateProfile', [
            'user' => $user,
            'role_id' => $role_id,
            'profile' => $profile
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request) {
        $user = Auth::user();
        $candidateToUpdate = $user->candidate;

        $candidateToUpdate->occupational_profile = $request->occupational_profile;

        $candidateToUpdate->save();

        return redirect()->route('user.index');
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
