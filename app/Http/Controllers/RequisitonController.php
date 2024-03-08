<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequisitionRequest;
use App\Models\Charge;
use App\Models\Requisiton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisitonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function create()
    {
        $role_id = Auth::user()->role_id;
        return view('requisition.create', [
            'role_id' => $role_id,
            'user' => Auth::user(),
            'jobs' => Charge::all()
        ]);
    }
    public function store(RequisitionRequest $request)
    {
        $requisition = new Requisiton();
        $requisition->charge_id = $request->charge_id;
        $requisition->job_description = $request->job_description;
        $requisition->justification = $request->justification;
        $requisition->ideal_candidate = $request->ideal_candidate;
        $requisition->mission_charge = $request->mission_charge;
        $requisition->responsabilities = $request->responsabilities;
        $requisition->candidate_description = $request->candidate_description;
        $requisition->candidate_talents = $request->candidate_talents;
        $requisition->selection_criteria = $request->selection_criteria;

        $requisition->save();

        return redirect()->route('recruiter.index');
    }

    public function show(Requisiton $requisiton)
    {
        //
    }

    public function edit(Requisiton $requisiton)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requisiton $requisiton)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requisiton $requisiton)
    {
        //
    }
}
