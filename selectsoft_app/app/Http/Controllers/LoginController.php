<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Document_type;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index() {

        return  view('/auth/login');
    }

    public function authenticate(LoginRequest $request) {
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        return redirect()->route('user.index');
    }
}
