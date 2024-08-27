<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            return redirect()->intended();
        } else {
            return back()->withErrors([
                'email' => "Identifiants incorrects."
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return to_route("home");
    }
}
