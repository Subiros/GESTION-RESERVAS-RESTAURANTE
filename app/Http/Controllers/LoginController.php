<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function login_send(Request $request) {
        $credenciales = $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credenciales['correo'], 'password' => $credenciales['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/welcome');
        }

        return back()->withErrors([
            'correo' => 'Credenciales incorrectas',
        ]);
    }
}
