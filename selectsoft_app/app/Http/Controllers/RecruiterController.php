<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Recruiter;
use App\Models\Selector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        $recruiter = $user->recruiter;

        if($recruiter->company_id == null) {
            $countries = Country::all();
            $cities = City::all();
            return view('/company/create', [
                'user' => $user,
                'role_id' => $role_id,
                'cities' => $cities,
                'countries' => $countries
            ]);
        } else {
            $company = $recruiter->company;
            return view('/recruiter/indexRecruiter', [
            'user' => $user,
            'role_id' => $role_id,
            'company' => $company
        ]);
        }
    }


    public function joinCompany(Company $company) :RedirectResponse {
        $user = Auth::user();

        $recruiter = $user->recruiter;

        $recruiter->company_id = $company->id;

        $recruiter->save();

        return redirect()->route('recruiter.index');

    }

    public function disassociateCompany(Company $company) :RedirectResponse {
        $user = Auth::user();

        $recruiter = $user->recruiter;
        $recruiter->company_id = null;
        $recruiter->save();

        $recruiters = Recruiter::where('company_id', $company->id)->get();
        $selectors = Selector::where('company_id', $company->id)->get();
        if ($recruiters->isEmpty() && $selectors->isEmpty()){
            $company->delete();
        }

        return redirect()->route('recruiter.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Recruiter $recruiter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recruiter $recruiter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recruiter $recruiter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recruiter $recruiter)
    {
        //
    }
}
