<?php

namespace App\Http\Controllers;

use App\Models\RequisitionStudy;
use Illuminate\Http\Request;

class RequisitionStudyController extends Controller
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
    public function show(RequisitionStudy $requisitionStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequisitionStudy $requisitionStudy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequisitionStudy $requisitionStudy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequisitionStudy $requisitionStudy)
    {
        $requisitionStudy->delete();
        return redirect()->back();
    }
}
