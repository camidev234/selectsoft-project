<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancieStudyRequest;
use App\Models\study_level;
use App\Models\study_status;
use App\Models\Vacancie;
use App\Models\Vacancie_study;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancieStudyController extends Controller
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
    public function create(Vacancie $vacancie) :View
    {
        $studyStatuses = study_status::all();
        $studyLevels = study_level::all();

        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/study_vacant/create', [
            'user' => $user,
            'role_id' => $role_id,
            'statuses' => $studyStatuses,
            'levels' => $studyLevels,
            'vacancie' => $vacancie
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacancieStudyRequest $request, Vacancie $vacancie) :RedirectResponse
    {
        $newStudy = new Vacancie_study();

        $newStudy->study_level_id = $request->study_level_id;
        $newStudy->study_status_id = $request->study_status_id;
        $newStudy->study_name = $request->study_name;
        $newStudy->points = $request->points;
        $newStudy->vacancie_id = $vacancie->id;

        $newStudy->save();

        return redirect()->route('vacancies.show', ['vacancie' => $vacancie]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancie_study $vacancie_study)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancie_study $vacancie_study)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancie_study $vacancie_study)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancie_study $vacancie_study)
    {
        //
    }
}
