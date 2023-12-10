<?php

namespace App\Http\Controllers;

use App\Models\applications;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Vacancie;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    private function compareCurriculum(User $user, Vacancie $vacancie)
    {

        $vacantStudies = $vacancie->studies;
        $candidateStudies = $user->educations;
        $totalScore = 0;
        if ($vacantStudies->isEmpty() || $candidateStudies->isEmpty()) {
            $totalScore = 0;
        } else {
            foreach ($vacantStudies as $vStudy) {
                foreach ($candidateStudies as $cStudy) {
                    if ($vStudy->study_level->id == $cStudy->study_level->id) {
                        $pointsAssigned = $vStudy->points;
                        $totalScore += $pointsAssigned;
                    } else {
                        continue;
                    }
                }
            }

        }

        return $totalScore;
    }
    public function store(User $user, Vacancie $vacancie)
    {
        $newPostulation = new applications();
        $newPostulation->vacant_id = $vacancie->id;
        $newPostulation->candidate_id = $user->candidate->id;
        $newPostulation->total_score = $this->compareCurriculum($user, $vacancie);
        $newPostulation->status_applications_id = 1;
        $newPostulation->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(applications $applications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(applications $applications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, applications $applications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(applications $applications)
    {
        //
    }
}
