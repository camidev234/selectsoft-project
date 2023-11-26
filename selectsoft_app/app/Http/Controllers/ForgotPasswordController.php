<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Mail\ForgotPasswordMailable;
use App\Models\Document_type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stringable;

class ForgotPasswordController extends Controller
{
    public function index(){

        return view('/auth/forgotPassword');

    }

    private function generarContrasenaAleatoria($len = 9){
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $len; $i++) {
        $password .= $caracteres[random_int(0, strlen($caracteres) - 1)];
    }

    return $password;
    }



    public function findUser(ForgotPasswordRequest $request) {
    $user = User::where('email', $request->input('email'))->first();

    if ($user) {
        $newPassword = $this->generarContrasenaAleatoria();

        $user->update(['password' => bcrypt($newPassword)]);

        $email = $user->email;
        $userName = $user->name." ".$user->last_name;
        Mail::to($email)->send(new ForgotPasswordMailable($newPassword, $userName));

        return redirect()->route('user.login')->with('mensaje','Verifica las credenciales enviadas a tu correo');
    } else {
        return redirect()->back()->with('mensaje', 'Usuario no encontrado');
    }
    }
}
