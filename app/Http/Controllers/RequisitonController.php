<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequisitionRequest;
use App\Models\Charge;
use App\Models\Company;
use App\Models\Requisiton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author;

class RequisitonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $requisitions = Requisiton::where('company_id', $company->id)->get();
        $role_id = Auth::user()->role_id;
        return view('requisition.index', [
            'role_id' => $role_id,
            'requisitions' => $requisitions,
            'user' => Auth::user(),
        ]);
    }
    public function create(Company $company)
    {
        $role_id = Auth::user()->role_id;
        return view('requisition.create', [
            'role_id' => $role_id,
            'user' => Auth::user(),
            'jobs' => Charge::all(),
            'company' => $company
        ]);
    }
    public function store(RequisitionRequest $request, Company $company)
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
        $requisition->company_id = $company->id;

        $requisition->save();

        return redirect()->route('recruiter.index');
    }

    public function show(Requisiton $requisition)
    {
        $role_id = Auth::user()->role_id;

        return view('requisition.show', [
            'role_id' => $role_id,
            'user' => Auth::user(),
            'requisition' => $requisition
        ]);
    }

    public function edit(Requisiton $requisiton)
    {
        //
    }

   
    public function update(Request $request, Requisiton $requisiton)
    {
        //
    }


    public function destroy(Requisiton $requisition)
    {
        $requisition->delete();

        return redirect()->back();
    }
}
