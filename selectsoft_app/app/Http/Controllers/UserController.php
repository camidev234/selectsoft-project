<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdatePasswordRequest;
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
    public function store(RegisterRequest $request)
    {
        $newUser = new User();

        $newUser->name = $request->input('name');
        $newUser->last_name = $request->input('last_name');
        $newUser->document_type_id = $request->input('document_type_id');
        $newUser->number_document = $request->input('number_document');
        $newUser->telephone = $request->input('telephone');
        $newUser->phone_number = $request->input('phone_number');
        $newUser->address = $request->input('address');
        $newUser->id_country = $request->input('id_country');
        $newUser->id_department = $request->input('id_department');
        $newUser->id_city = $request->input('id_city');
        $newUser->birthdate = $request->input('birthdate');
        $newUser->email = $request->input('email');
        $newUser->password = $request->input('password');
        $newUser->role_id = $request->input('role_id');


        $mail = $request->email;

        $userName = $request->name." ".$request->last_name;

        Mail::to($mail)->send(new WelcomeMailable($userName));

        $newUser->save();

        if($request->role_id == 1) {
            $newCandidate = new Candidate();
            $newCandidate->user_id = $newUser->id;
            $newCandidate->occupational_profile = 'NULL';

            $newCandidate->save();
        }else if ($request->role_id == 2) {
            $newSelector = new Selector();
            $newSelector->user_id = $newUser->id;

            $newSelector->save();
        } else if($request->role_id == 3) {
            $newRecruiter = new Recruiter();
            $newRecruiter->user_id = $newUser->id;

            $newRecruiter->save();
        } else if($request->role_id == 4) {
            $newInstructor = new Instructor();
            $newInstructor->user_id = $newUser->id;

            $newInstructor->save();
        }

        return view('/auth/welcome');

    }

    public function updatePassword() {
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('/update_password/updatePassword', [
            'user' => $user,
            'role_id' => $role_id
        ]);
    }

    public function storePassword(UpdatePasswordRequest $request) {
        $user = Auth::user();
        $userToUpdate = User::find($user->id);

        $userToUpdate->password = $request->password;
        $userToUpdate->save();

        auth()->logout();

        return redirect()->route('user.login');

    }

    public function editUserRole(User $user) {
        $userAuth = Auth::user();
        $roles = Role::all();
        $rolesReturn = [];

        foreach($roles as $role) {
            if ($role->id == $user->role_id ){
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

    public function updateUserRole(User $userMod, Request $request) {
        if($userMod->role_id ==1){
            $candidate = Candidate::where('user_id', $userMod->id)->first();

            $candidate->delete();
        }else if ($userMod->role_id == 2) {
            $selector = Selector::where('user_id', $userMod->id)->first();
            $selector->delete();
        } else if($userMod->role_id == 3){
            $recruiter = Recruiter::where('user_id', $userMod->id)->first();
            $recruiter->delete();
        }


        $userMod->role_id = $request->role_id;


        $userMod->save();

        if($userMod->role_id == 1) {
            $newcandidate = new Candidate();
            $newcandidate->user_id = $userMod->id;
            $newcandidate->occupational_profile = 'NULL';
            $newcandidate->save();
        } else if ($userMod->role_id == 2) {
            $newselector = new Selector();
            $newselector->user_id = $userMod->id;
            $newselector->save();
        } else if($userMod->role_id == 3) {
            $newRecruiter = new Recruiter();
            $newRecruiter->user_id = $userMod->id;
            $newRecruiter->save();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
