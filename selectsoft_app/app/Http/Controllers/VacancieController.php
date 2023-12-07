<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancieRequest;
use App\Models\Charge;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Salaries_type;
use App\Models\Vacancie;
use App\Models\Work_day;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company) :View
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        $vacants = Vacancie::where('company_id', $company->id)->get();

        return view('/vacancie/indexVacancie', [
            'user' => $user,
            'role_id' => $role_id,
            'vacants' => $vacants,
            'company' => $company
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $countries = Country::all();
        $cities = City::all();
        $salaries = Salaries_type::all();
        $days = Work_day::all();
        $recruiter = $user->recruiter;

        if($recruiter) {
            $company = $recruiter->company;
            $charges = Charge::where('company_id', $company->id)->get();

            return view('/vacancie/create', [
                'user' => $user,
                'role_id' => $role_id,
                'countries' => $countries,
                'cities' => $cities,
                'salaries' => $salaries,
                'company' => $company,
                'charges' => $charges,
                'days' => $days
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacancieRequest $request, Company $company) :RedirectResponse
    {
        $newVacancie = new Vacancie();

        $newVacancie->vacancie_code = $request->vacancie_code;
        if($request->skills == null){
            $newVacancie->skills = 'Ninguna';
        }else{
            $newVacancie->skills = $request->skills;
        }
        $newVacancie->required_experience = $request->required_experience;
        $newVacancie->salary_range = $request->salary_range;
        $newVacancie->number_vacancies = $request->number_vacancies;
        $newVacancie->charge_id = $request->charge_id;
        $newVacancie->schedule = $request->schedule;
        $newVacancie->work_day_id = $request->work_day_id;
        $newVacancie->salaries_type_id = $request->salaries_type_id;
        $newVacancie->applicant_person = $request->applicant_person;
        $newVacancie->country_id = $request->country_id;
        $newVacancie->city_id = $request->city_id;
        $newVacancie->annotations = $request->annotations;
        $newVacancie->company_id = $request->company_id;
        $newVacancie->company_id = $company->id;

        $newVacancie->save();


        return redirect()->route('vacancies.index', ['company' => $company]);
    }

    /**
     * Display the specified resource.
     */
    public function showToRecruiter(Vacancie $vacancie)
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/vacancie/showRecruiter', [
            'user' => $user,
            'role_id' => $role_id,
            'vacancie' => $vacancie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancie $vacancie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancie $vacancie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancie $vacancie)
    {
        //
    }
}
