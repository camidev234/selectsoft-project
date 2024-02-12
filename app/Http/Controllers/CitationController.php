<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitationRequest;
use App\Mail\CitationMailable;
use App\Models\applications;
use App\Models\Citation;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CitationController extends Controller
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
    public function create(applications $application)
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $selector = $user->selector;
        return view('/citations/create', [
            'user' => $user,
            'role_id' => $role_id,
            'selector' => $selector,
            'application' => $application
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CitationRequest $request, applications $application) :RedirectResponse
    {

            $newCitation = new Citation();
            $newCitation->application_id = $application->id;
            $newCitation->citation_type = $request->citation_type;
            $newCitation->from = $request->from;
            $newCitation->to = $request->to;
            $newCitation->Asunto = $request->subject;
            $newCitation->message = $request->message;
            $newCitation->send_by = Auth::user()->email;
            $newCitation->save();

            $mail = $request->to;
            Mail::to($mail)
            ->send(new CitationMailable($request->from, $request->subject, $request->message, $application->vacant->company->business_name));

            return redirect()->route('selector.viewApplications', ['vacancie' => $application->vacant]);
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
