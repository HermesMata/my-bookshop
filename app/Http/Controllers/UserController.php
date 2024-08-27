<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view("user.register");
    }

    public function doRegister(RegisterUserRequest $request)
    {
        $data = $request->validated();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
        Auth::login($user);
        $request->session()->regenerate();
        return to_route("home");
    }

    // Gestion du compte
    public function manage(Request $request)
    {
        return view("user.manage", [
            "user" => Auth::user(),
        ]);
    }
}
