<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequisitionRequest;
use App\Models\Charge;
use App\Models\Requisiton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisitonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function create()
    {
        $role_id = Auth::user()->role_id;
        return view('requisition.create', [
            'role_id' => $role_id,
            'user' => Auth::user(),
            'jobs' => Charge::all()
        ]);
    }
    public function store(RequisitionRequest $request)
    {
        //
    }

    public function show(Requisiton $requisiton)
    {
        //
    }

    public function edit(Requisiton $requisiton)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requisiton $requisiton)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requisiton $requisiton)
    {
        //
    }
}
