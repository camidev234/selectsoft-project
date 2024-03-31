<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\WelcomeMailable;
use App\Models\Candidate;
use App\Models\City;
use App\Models\Country;
use App\Models\Departament;
use App\Models\Document_type;
use App\Models\Instructor;
use App\Models\Recruiter;
use App\Models\Role;
use App\Models\Selector;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $departaments = Departament::all();
        $document_types = Document_type::all();
        $roles = Role::all();
        return view('/auth/register', [
            'countries' => $countries,
            'document_types' => $document_types,
            'cities' => $cities,
            'departaments' => $departaments,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($validatedData)
    {
        $newUser = new User();

        $newUser->name = strtoupper($validatedData['name']);
        $newUser->last_name = strtoupper($validatedData['last_name']);
        $newUser->document_type_id = strtoupper($validatedData['document_type_id']);
        $newUser->number_document = $validatedData['number_document'];
        $newUser->telephone = $validatedData['telephone'];
        $newUser->phone_number = $validatedData['phone_number'];
        $newUser->address = strtoupper($validatedData['address']);
        $newUser->country_id = 37;
        $newUser->departament_id = $validatedData['id_department'];
        $newUser->city_id = strtoupper($validatedData['id_city']);
        $newUser->birthdate = strtoupper($validatedData['birthdate']);
        $newUser->email = strtolower($validatedData['email']);
        $newUser->password = $validatedData['password'];
        $newUser->role_id = 1;
        
        $mail = $validatedData['email'];
        
        $userName = $validatedData['name'] . " " . $validatedData['last_name'];

        Mail::to($mail)->send(new WelcomeMailable($userName));

        $newUser->save();

        if ($newUser->role_id == 1) {
            $newCandidate = new Candidate();
            $newCandidate->user_id = $newUser->id;
            $newCandidate->occupational_profile = 'NULL';

            $newCandidate->save();
        }

        return redirect()->route('user.login');
    }

    public function updatePassword()
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/update_password/updatePassword', [
            'user' => $user,
            'role_id' => $role_id
        ]);
    }

    public function storePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();
        $userToUpdate = User::find($user->id);

        $userToUpdate->password = $request->password;
        $userToUpdate->save();

        auth()->logout();

        return redirect()->route('user.login');
    }

    public function editUserRole(User $user)
    {
        $userAuth = Auth::user();
        $roles = Role::all();
        $rolesReturn = [];

        foreach ($roles as $role) {
            if ($role->id == $user->role_id) {
                continue;
            } else {
                $rolesReturn[] = $role;
            }
        }

        return view('/instructor/editRole', [
            'userToMod' => $user,
            'user' => $userAuth,
            'roles' => $rolesReturn
        ]);
    }

    public function updateUserRole(User $userMod, Request $request): RedirectResponse
    {
        if ($userMod->role_id == 1) {
            $candidate = Candidate::where('user_id', $userMod->id)->first();

            $candidate->delete();
        } else if ($userMod->role_id == 2) {
            $selector = Selector::where('user_id', $userMod->id)->first();
            if ($selector->company_id == null) {
                $selector->delete();
            } else {
                return redirect()->route('instructor.selectors')->with('message', 'El seleccionador aun esta asociado a una empresa');
            }
        } else if ($userMod->role_id == 3) {
            $recruiter = Recruiter::where('user_id', $userMod->id)->first();
            if ($recruiter->company_id == null) {
                $recruiter->delete();
            } else {
                return redirect()->route('instructor.recruiters')->with('message', 'El reclutador aun esta asociado a una empresa');
            }
        } else if ($userMod->role_id == 4) {
            $instructor = Instructor::where('user_id', $userMod->id)->first();
            $instructor->delete();
        }


        $userMod->role_id = $request->role_id;


        $userMod->save();

        if ($userMod->role_id == 1) {
            $newcandidate = new Candidate();
            $newcandidate->user_id = $userMod->id;
            $newcandidate->occupational_profile = 'NULL';
            $newcandidate->save();
        } else if ($userMod->role_id == 2) {
            $newselector = new Selector();
            $newselector->user_id = $userMod->id;
            $newselector->save();
        } else if ($userMod->role_id == 3) {
            $newRecruiter = new Recruiter();
            $newRecruiter->user_id = $userMod->id;
            $newRecruiter->save();
        } else if ($userMod->role_id == 4) {
            $newInstructor = new Instructor();
            $newInstructor->user_id = $userMod->id;
            $newInstructor->save();
        }



        return redirect()->route('instructor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $role_id = $user->role_id;
        $countries = Country::all();
        $departaments = Departament::all();
        $cities = City::all();
        // $actualCountry = $user->country_id;
        // $actualCity = $user->city_id;
        // $actualDepartament = $user->departament_id;
        return view('/candidate/updateCandidate', [
            'user' => $user,
            'countries' => $countries,
            'departaments' => $departaments,
            'cities' => $cities,
            'role_id' => $role_id,
            // 'actualCountry' => $actualCountry,
            // 'actualCity' => $actualCity,
            // 'actualDepartament' => $actualDepartament
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->telephone = $request->telephone;
        $user->phone_number = $request->phone_number;
        $user->country_id = $request->country_id;
        $user->departament_id = $request->departament_id;
        $user->city_id = $request->city_id;
        $user->address = strtoupper($request->address);

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        // dd($user);

        switch ($user->role_id) {
            case 1:
                $modelToDelete = Candidate::where('user_id', $user->id)->first();
                $message = 'Candidato';
                break;
            case 2:
                $modelToDelete = Selector::where('user_id', $user->id)->first();
                // dd($modelToDelete);
                $message = 'Seleccionador';
                break;
            case 3: 
                $modelToDelete = Recruiter::where('user_id', $user->id)->first();
                $message = 'Reclutador';
                break;
            case 4:
                $modelToDelete = Instructor::where('user_id', $user->id)->first();
                // dd($modelToDelete);
                $message = 'instructor';
                break;
            default:
                $modelToDelete = null;
        }

        // dd($modelToDelete);

        if ($modelToDelete) {
            $modelToDelete->delete();
            $user->delete();
            return redirect()->back();
        } else {
            return redirect()->route('instructor.index')->with('message', "El usuario no tiene asociado ningun $message");
        }
    }
}
