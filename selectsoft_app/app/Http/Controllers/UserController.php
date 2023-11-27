<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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

        $newUser->save();


        $mail = $newUser->email;

        $userName = $newUser->name." ".$newUser->last_name;

        Mail::to($mail)->send(new WelcomeMailable($userName));


        if($request->role_id == 1) {
            $newCandidate = new Candidate();
            $newCandidate->user_id = $newUser->id;

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
