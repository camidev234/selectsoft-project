<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Document_type;
use Illuminate\Http\Request;
use App\Models\Person_experience;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index() {

        return  view('/auth/login');
    }

    public function authenticate(LoginRequest $request) :RedirectResponse {
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        $user = Auth::user();

        if($user->role_id == 1) {
            return redirect()->route('user.index');
        } else if($user->role_id == 2) {
            return redirect()->route('selector.index');
        } else if($user->role_id == 3){
            return redirect()->route('recruiter.index');
        } else if ($user->role_id == 4) {
            return redirect()->route('instructor.index');
        }
    }
}
