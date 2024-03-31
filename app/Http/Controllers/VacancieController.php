<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateVacancieRequest;
use App\Http\Requests\VacancieRequest;
use App\Models\applications;
use App\Models\Charge;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\RequisitionStudy;
use App\Models\Requisiton;
use App\Models\Salaries_type;
use App\Models\Vacancie;
use App\Models\Work_day;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportRedirects\Redirector;

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
            'company' => $company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
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
            $requisitions = Requisiton::where('company_id', $company->id)->get();

            return view('/vacancie/create', [
                'user' => $user,
                'role_id' => $role_id,
                'countries' => $countries,
                'cities' => $cities,
                'salaries' => $salaries,
                'company' => $company,
                'charges' => $charges,
                'days' => $days,
                'requisitions' => $requisitions
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Company $company, array $validatedData)
    {
        $newVacancie = new Vacancie();

        // $newVacancie->vacancie_code = $request->vacancie_code;
        // if($request->skills == null){
        //     $newVacancie->skills = 'Ninguna';
        // }else{
        //     $newVacancie->skills = $request->skills;
        // }

        $requisitonToFind = Requisiton::find($validatedData['requisiton_id']);
        $chargeToAssign = Charge::find($requisitonToFind->charge_id);

        $newVacancie->vacancie_code = $validatedData['vacancie_code'];
        $newVacancie->salary_range = $validatedData['salary_range'];
        $newVacancie->charge_id = $chargeToAssign->id;
        $newVacancie->schedule = $validatedData['schedule'];
        $newVacancie->work_day_id = $validatedData['work_day_id'];
        $newVacancie->salaries_type_id = $validatedData['salaries_type_id'];
        $newVacancie->applicant_person = $validatedData['applicant_person'];
        $newVacancie->departament_id = $validatedData['departament_id'];
        $newVacancie->city_id = $validatedData['city_id'];
        $newVacancie->annotations = $validatedData['annotations'];
        $newVacancie->requisiton_id = $validatedData['requisiton_id'];
        $newVacancie->company_id = $company->id;

        $newVacancie->save();


        return redirect()->route('vacancies.index', ['company' => $company]);
    }

    /**
     * Display the specified resource.
     */
    public function showToRecruiter(Vacancie $vacancie) :View
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $functions = $vacancie->charge->functions;
        $educations = $vacancie->requisiton->studies;
        $company = $vacancie->company;
        $applicants = applications::where('vacant_id', $vacancie->id)->get();

        $countApplicants = $applicants->isEmpty() ? 0 : $applicants->count();
        return view('/vacancie/showRecruiter', [
            'user' => $user,
            'role_id' => $role_id,
            'vacancie' => $vacancie,
            'functions' => $functions,
            'studies' => $educations,
            'company' => $company,
            'applicants' => $countApplicants
        ]);
    }

    public function showToCandidate(Vacancie $vacancie) :View
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $functions = $vacancie->charge->functions;
        $company = $vacancie->company;
        $candidate = $user->candidate;
        $requisition = $vacancie->requisiton;
        $studies = RequisitionStudy::where('requisiton_id', $requisition->id)->get();

        $application = applications::where('candidate_id', $candidate->id)
                           ->where('vacant_id', $vacancie->id)->get();

        $is_postulated = $application->isEmpty() ? false : true;

        $applicants = applications::where('vacant_id', $vacancie->id)->get();

        $countApplicants = $applicants->isEmpty() ? 0 : $applicants->count();

        if ($candidate) {
            return view('/vacancie/showToCandidate', [
                'user' => $user,
                'role_id' => $role_id,
                'vacancie' => $vacancie,
                'functions' => $functions,
                'company' => $company,
                'postulated' => $is_postulated,
                'applicants' => $countApplicants,
                'studies' => $studies
            ]);
        } else {
            abort(404, 'Resource Not Found');
        }
    }

    public function editStatus(Vacancie $vacancie):RedirectResponse{

        if($vacancie->is_active){
            $vacancie->is_active = 0;
        }else{
            $vacancie->is_active = 1;
        }

        $vacancie->save();

        return redirect()->back();
    }

    // public function findVacancieByCompany(Request $request,Company $company) {
    //     $search = $request->input('search');
    //     $user = Auth::user();
    //     $role_id = $user->role_id;

    //     if ($search) {
    //         $vacants = Vacancie::whereHas('charge', function ($query) use ($search) {
    //             $query->where('charge', 'LIKE', "%{$search}%");
    //         })->where('company_id', $company->id)->get();

    //         if ($vacants->isEmpty()) {
    //             return redirect()->route('vacancies.index', ['company' => $company])->with('message', 'No se encontraron vacantes para la búsqueda: ' . $search);
    //         } else {
    //             $find = true;
    //             return view('/vacancie/indexVacancie', [
    //                 'vacantsFind' => $vacants,
    //                 'find' => $find,
    //                 'user' => $user,
    //                 'role_id' => $role_id,
    //                 'company' => $company
    //             ]);
    //         }
    //     } else {
    //         return back()->with('message', 'Introduzca un valor para buscar.');
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancie $vacancie, Company $company) :View
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $currentCountry = $vacancie->country;
        $countries = Country::where('id', '!=', $currentCountry->id)->get();
        $currentCity = $vacancie->city;
        $cities = City::where('id', '!=', $currentCity->id)->get();
        $currentSalary = $vacancie->salaries_type;
        $salaries = Salaries_type::where('id', '!=', $currentSalary->id)->get();
        $currentSchedule = $vacancie->work_day;
        $days = Work_day::where('id', '!=', $currentSchedule->id)->get();;
        $currentCharge = $vacancie->charge;
        $requisitions = Requisiton::where('company_id', $company->id)->where('charge_id', '!=', $currentCharge->id)->get();

        return view('/vacancie/edit', [
            'user' => $user,
            'role_id' => $role_id,
            'countries' => $countries,
            'cities' => $cities,
            'salaries' => $salaries,
            'days' => $days,
            'requisitions' => $requisitions,
            'vacancie' => $vacancie,
            'company' => $company
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacancieRequest $request, Vacancie $vacancie, Company $company)
    {
        $vacancie->vacancie_code = $request->vacancie_code;
        if($request->skills == null){
            $vacancie->skills = 'Ninguna';
        }else{
            $vacancie->skills = $request->skills;
        }

        $chargeToAssign = Charge::find(Requisiton::find($request->requisiton_id)->charge_id);

        $vacancie->required_experience = $request->required_experience;
        $vacancie->salary_range = $request->salary_range;
        $vacancie->number_vacancies = $request->number_vacancies;
        $vacancie->charge_id = $chargeToAssign->id;
        $vacancie->schedule = $request->schedule;
        $vacancie->work_day_id = $request->work_day_id;
        $vacancie->salaries_type_id = $request->salaries_type_id;
        $vacancie->applicant_person = $request->applicant_person;
        $vacancie->country_id = $request->country_id;
        $vacancie->city_id = $request->city_id;
        $vacancie->annotations = $request->annotations;
        $vacancie->requisiton_id = $request->requisiton_id;
        $vacancie->company_id = $company->id;

        $vacancie->save();


        return redirect()->route('vacancies.index', ['company' => $company]);
    }

    public function indexToCandidate(Request $request)  {
        $user = Auth::user();
        $role_id = $user->role_id;

        $search = $request->search;
        if ($search) {
            $vacants = Vacancie::where('vacancie_code', 'LIKE', "%{$search}%")->orWhereHas('charge', function ($query) use ($search) {
            $query->where('charge', 'LIKE', "%{$search}%");})->get();

            if ($vacants->isEmpty()) {
                return redirect()->route('user.index')->with('message', 'No se encontraron vacantes para la búsqueda: ' . $search);
            } else {
                return view('/vacancie/indexToCandidate', [
                    'vacants' => $vacants,
                    'user' => $user,
                    'role_id' => $role_id
                ]);
            }
        } else {
            return back()->with('message', 'Introduzca un valor para buscar.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancie $vacancie)
    {
        //
    }
}
