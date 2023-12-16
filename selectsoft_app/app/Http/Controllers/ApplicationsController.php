<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateScoreRequest;
use App\Models\applications;
use App\Models\Candidate;
use App\Models\Status_aplications;
use App\Models\User;
use App\Models\Vacancie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\Configuration\Variable;
use Ramsey\Uuid\Type\Integer;

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
    public function store(User $user, Vacancie $vacancie) :RedirectResponse
    {
        $newPostulation = new applications();
        $newPostulation->vacant_id = $vacancie->id;
        $newPostulation->candidate_id = $user->candidate->id;
        $newPostulation->education_score = $this->compareCurriculum($user, $vacancie);
        $newPostulation->status_applications_id = 1;
        $newPostulation->total_score = $this->compareCurriculum($user, $vacancie);
        $newPostulation->save();

        return redirect()->back()->with('message', 'Postulacion para la vacante '. $vacancie->vacancie_code . ' realizada con exito');
    }

    public function showApplications(Vacancie $vacancie) :View {
        $user = Auth::user();
        $role_id = $user->role_id;
        $statusApplications = Status_aplications::skip(2)->take(PHP_INT_MAX)->get();
        $applications = applications::where('vacant_id', $vacancie->id)
            ->orderBy('total_score', 'desc')->orderBy('status_applications_id', 'asc')->get();

        return view('selector/showCandidates', [
            'user' => $user,
            'role_id' => $role_id,
            'applications' => $applications,
            'statuses' => $statusApplications
        ]);
    }

    public function interview(applications $application) :View {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/application/editInterviewScore', [
            'user' => $user,
            'role_id' => $role_id,
            'application' => $application
        ]);
    }

    public function updateInterwievScore(UpdateScoreRequest $request,applications $application) {
        if($request->opperation == 1){
            $application->interview_score += $request->new_score;
            $application->total_score += $request->new_score;
        } else {
            $application->interview_score -= $request->new_score;
            $application->total_score -= $request->new_score;
        }
        $application->save();
        $vacancie = $application->vacant;
        return redirect()->route('selector.viewApplications', ['vacancie' => $vacancie]);
    }

    public function technical(applications $application) :View {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/application/editTechnicalScore', [
            'user' => $user,
            'role_id' => $role_id,
            'application' => $application
        ]);
    }

    public function updateTechnicalScore(UpdateScoreRequest $request,applications $application) {
        if($request->opperation == 1){
            $application->technical_test_score += $request->new_score;
            $application->total_score += $request->new_score;
        } else {
            $application->technical_test_score -= $request->new_score;
            $application->total_score -= $request->new_score;
        }
        $application->save();
        $vacancie = $application->vacant;
        return redirect()->route('selector.viewApplications', ['vacancie' => $vacancie]);
    }

    public function personality(applications $application) :View {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/application/editPersonaltyScore', [
            'user' => $user,
            'role_id' => $role_id,
            'application' => $application
        ]);
    }

    public function updatePersonalityScore(UpdateScoreRequest $request,applications $application) {
        if($request->opperation == 1){
            $application->tersonality_test += $request->new_score;
            $application->total_score += $request->new_score;
        } else {
            $application->tersonality_test -= $request->new_score;
            $application->total_score -= $request->new_score;
        }
        $application->save();
        $vacancie = $application->vacant;
        return redirect()->route('selector.viewApplications', ['vacancie' => $vacancie]);
    }

    public function updateStatus(Request $request, applications $application){
        $application->status_applications_id = $request->newStatus;
        if($request->newStatus == 3 || $request->newStatus == 4) {
            $aditionScores = $application->education_score + $application->interview_score + $application->technical_test_score + $application->tersonality_test;
            $application->total_score = round($aditionScores / 4);
        }
        $application->save();
        $vacancie = $application->vacant;

        return redirect()->route('selector.viewApplications', ['vacancie' => $vacancie]);
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
