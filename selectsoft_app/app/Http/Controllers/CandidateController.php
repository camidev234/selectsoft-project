<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
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
            'supports' => $countSupports
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
