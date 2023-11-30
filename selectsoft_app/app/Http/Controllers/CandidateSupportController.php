<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportCandidatesRequest;
use App\Models\Candidate_support;
use App\Models\support_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateSupportController extends Controller
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
        $user = Auth::user();
        $role_id = $user->role_id;
        $supportTypes = support_type::all();

        return view('/supports_person/create', [
            'user' => $user,
            'role_id' => $role_id,
            'supportTypes' => $supportTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupportCandidatesRequest $request)
    {
        $user = Auth::user();
        $newSupport = new Candidate_support();
        $file = $request->file('support_file');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/files/pdf', $file_name);
        $fileRoute = 'storage/files/pdf/' . $file_name;

        $newSupport->support_type_id = $request->support_type_id;
        $newSupport->support_file = $fileRoute;
        $newSupport->user_id = $user->id;
        $newSupport->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate_support $candidate_support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate_support $candidate_support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate_support $candidate_support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate_support $candidate_support)
    {
        //
    }
}
