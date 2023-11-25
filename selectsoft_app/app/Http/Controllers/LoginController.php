<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Document_type;
use Illuminate\Http\Request;
use App\Models\Person_experience;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index() {

        return  view('/auth/login');
    }

    public function authenticate(LoginRequest $request) {
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        $user = Auth::user();

        if($user->id == 1) {
            return redirect()->route('user.index');
        } else if($user->id == 2) {
            return redirect()->route('selector.index');
        }

    }
}
