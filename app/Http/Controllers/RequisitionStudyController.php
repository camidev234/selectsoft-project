<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequisitionRequest;
use App\Models\RequisitionStudy;
use App\Models\Requisiton;
use App\Models\study_level;
use App\Models\study_status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisitionStudyController extends Controller
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
    public function create(Requisiton $requisiton)
    {
        return view('study_requisition.create', [
            'levels' => study_level::all(),
            'statuses' => study_status::all(),
            'requisiton' => $requisiton,
            'role_id' => Auth::user()->role_id,
            'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationRequisitionRequest $request, Requisiton $requisiton)
    {
        $newEducation = new RequisitionStudy();

        $newEducation->study_name = $request->study_name;
        $newEducation->points = $request->points;
        $newEducation->study_level_id = $request->study_level_id;
        $newEducation->study_status_id = $request->study_status_id;
        $newEducation->requisiton_id = $requisiton->id;

        $newEducation->save();

        return redirect()->route('requisition.show', ['requisition' => $requisiton]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RequisitionStudy $requisitionStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequisitionStudy $requisitionStudy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequisitionStudy $requisitionStudy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequisitionStudy $requisitionStudy)
    {
        $requisitionStudy->delete();
        return redirect()->back();
    }
}
