<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Departament;
use App\Models\Document_type;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

        return redirect()->route('user.login');

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
