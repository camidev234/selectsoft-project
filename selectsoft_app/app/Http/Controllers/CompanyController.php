<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
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


        if ($recruiter){
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
    public function show(Company $company)
    {
        //
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
