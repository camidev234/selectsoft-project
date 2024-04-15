<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequisitionRequest;
use App\Models\Charge;
use App\Models\Company;
use App\Models\Occupation_function;
use App\Models\RequisitionStudy;
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
            'company' => $company
        ]);
    }
    public function create(Company $company)
    {
        $role_id = Auth::user()->role_id;
        return view('requisition.create', [
            'role_id' => $role_id,
            'user' => Auth::user(),
            'jobs' => Charge::where('company_id', $company->id)->get(),
            'company' => $company
        ]);
    }
    public function store(RequisitionRequest $request, Company $company)
    {
        $requisition = new Requisiton();
        $requisition->charge_id = $request->charge_id;
        $requisition->required_experience = $request->required_experience;
        $requisition->number_vacancies = $request->number_vacancies;
        $requisition->company_id = $company->id;

        $requisition->save();

        return redirect()->route('recruiter.index');
    }

    public function show(Requisiton $requisition)
    {
        $role_id = Auth::user()->role_id;
        $educations = RequisitionStudy::where('requisiton_id', $requisition->id)->get();
        $functions = Occupation_function::where('charge_id', $requisition->charge_id)->get();

        return view('requisition.show', [
            'role_id' => $role_id,
            'user' => Auth::user(),
            'requisition' => $requisition,
            'educations' => $educations,
            'functions' => $functions
        ]);
    }

    public function edit(Requisiton $requisiton)
    {

        $role_id = Auth::user()->role_id;
        $user = Auth::user();

        return view('requisition.edit', [
            'requisiton' => $requisiton,
            'user' => $user,
            'role_id' => $role_id
        ]);
    }

   
    public function update($validatedData, Requisiton $requisiton)
    {
        $requisiton->charge_id = $validatedData['charge_id'];
        $requisiton->number_vacancies = $validatedData['number_vacancies'];
        $requisiton->required_experience = $validatedData['required_experience'];

        $requisiton->save();

        return redirect()->route('requisition.index', ['company' => $requisiton->company_id]);
    }


    public function destroy(Requisiton $requisition)
    {
        $requisition->delete();

        return redirect()->back();
    }
}
