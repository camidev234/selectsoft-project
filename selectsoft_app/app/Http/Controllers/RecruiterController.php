<?php

namespace App\Http\Controllers;

use App\Models\Recruiter;
use Illuminate\Http\Request;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recruiters = Recruiter::all();
        return view("recruiter.index",compact("recruiters"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("recruiter/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'document_type_id'=>'required|string|min:2|max:20',
            'document_number'=>'required|string|min:2|max:15',
            'names'=>'required|string|min:2|max:100',
            'surnames'=>'required|string|min:2|max:4100'
        ]);

        Recruiter::create([
            'document_type_id'=>$request->document_type_id,
            'document_number'=>$request->document_number,
            'names'=>$request->names,
            'surnames'=>$request->surnames
        ]);
        return redirect()->back()
        ->with('success','Reclutador creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recruiter $recruiter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recruiter $recruiter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recruiter $recruiter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recruiter $recruiter)
    {
        //
    }
}
