<?php

namespace App\Http\Controllers;

use App\Models\applications;
use App\Models\Candidate_support;
use App\Models\Company;
use App\Models\Recruiter;
use App\Models\Selector;
use App\Models\Vacancie;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = Auth::user();
            $role_id = $user->role_id;
            $selector = $user->selector;
            if ($selector) {
                $find = false;
                $allCompanies = Company::all();
                if ($selector->company_id == null) {
                    return view('company.indexCompany', [
                        'user' => $user,
                        'role_id' => $role_id,
                        'find' => $find,
                        'allCompanies' => $allCompanies,
                        'selector' => $selector
                    ]);
                } else {
                    $company = $selector->company;
                    $vacancies = Vacancie::where('company_id', $company->id)->get();
                    return view('/selector/indexSelector', [
                        'user' => $user,
                        'role_id' => $role_id,
                        'selector' => $selector,
                        'company' => $company,
                        'vacants' => $vacancies
                    ]);
                }
            }
        } catch (Exception $e) {
            abort(404, 'Resource Not Found');
        }
    }


    public function joinCompany(Company $company, Selector $selector)
    {
        $selector->company_id = $company->id;

        $selector->save();

        return redirect()->route('selector.index');
    }


    public function disassociateCompany(Company $company) :RedirectResponse {
        try{
            $user = Auth::user();

            $selector = $user->selector;
            $selector->company_id = null;
            $selector->save();

            $recruiters = Recruiter::where('company_id', $company->id)->get();
            $selectors = Selector::where('company_id', $company->id)->get();
            if ($recruiters->isEmpty() && $selectors->isEmpty()){
            $company->delete();
            }

        return redirect()->route('selector.index');
        } catch(Exception $e) {
            abort(404, 'Resource Not Found');
        }
    }

    public function viewCurriculum(applications $application) {
        try {
            $candidate = $application->candidate;
            $educations = $candidate->user->educations;
            $experiences = $candidate->user->experiences;

            $user = Auth::user();
            $role_id = $user->role_id;

            if($application->status_applications_id == 1 ){
                $application->status_applications_id = 2;
                $application->save();
            }

            $supports = Candidate_support::where('user_id', $application->candidate->user_id)->get();

            return view('/selector/showCurriculum', [
            'user' => $user,
            'role_id' => $role_id,
            'educations' => $educations,
            'experiencies' => $experiences,
            'candidate' => $candidate,
            'supports' => $supports
        ]);
        } catch (Exception $e){
            abort(404, 'Resource not found');
        }

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
    public function show(Selector $selector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Selector $selector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Selector $selector)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Selector $selector)
    {
        //
    }
}
