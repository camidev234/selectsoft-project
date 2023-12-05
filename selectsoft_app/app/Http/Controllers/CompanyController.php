<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\FindCompanyRequest;
use App\Models\Company;
use App\Models\Recruiter;
use App\Models\Selector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $companies = Company::all();
        $user = Auth::user();
        $role_id = $user->role_id;
        $withFind = false;
        return view('/company/indexCompany', [
            'user' => $user,
            'role_id' => $role_id,
            'allCompanies' => $companies,
            'find' => $withFind
        ]);
    }


    public function findCompany(FindCompanyRequest $request)
    {
        $search = $request->input('search');
        $user = Auth::user();
        $role_id = $user->role_id;

        if ($search) {
            $companies = Company::where('nit', 'LIKE', "%{$search}%")->get();

            if ($companies->isEmpty()) {
                return redirect()->route('company.index')->with('message', 'No se encontraron empresas para la búsqueda: ' . $search);
            } else {
                $find = true;
                return view('/company/indexCompany', [
                    'companyFind' => $companies,
                    'find' => $find,
                    'user' => $user,
                    'role_id' => $role_id
                ]);
            }
        } else {
            return back()->with('message', 'Introduzca un valor para buscar.');
        }
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
    public function store(CompanyRequest $request) :RedirectResponse
    {
        $newCompany = new Company();

        $newCompany->nit = $request->nit;
        $newCompany->business_name = $request->business_name;
        $newCompany->country_id = $request->country_id;
        $newCompany->city_id = $request->city_id;
        $newCompany->phone = $request->phone;
        $newCompany->address = $request->address;
        $newCompany->email = $request->email;



        $user = Auth::user();

        $recruiter = $user->recruiter;


        if ($recruiter) {
            $newCompany->save();
            $recruiter->company_id = $newCompany->id;

            $recruiter->save();

            return redirect()->route('recruiter.index');
        } else {
            return redirect()->back()->with('error', 'Hubo un problema al momento de crear la empresa');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company) :View
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $recruiters = Recruiter::where('company_id', $company->id)->get();
        $selectors = Selector::where('company_id', $company->id)->get();
        if (empty($recruiters)){
            $countRecruiters = 0;
        }else {
            $countRecruiters = count($recruiters);
        }

        if (empty($selectors)){
            $countSelectors = 0;
        }else{
            $countSelectors = count($selectors);
        }


        return view('/company/show', [
            'user' => $user,
            'role_id' => $role_id,
            'company' => $company,
            'selectors' => $countSelectors,
            'recruiters' => $countRecruiters
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
