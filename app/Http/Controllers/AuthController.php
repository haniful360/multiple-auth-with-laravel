<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function authenticate(LoginRequest $request)
    {

     if(Auth::attempt(['email' => $request->email, 'password' => $request->  password])){
        return redirect()->route('dashboard');
     }
     else{
        return redirect()->route('login')->with('error', 'Either email or password is incorrect');
     }
    }


    public function register()
    {
        return view('frontend.auth.register');
    }

    public function processRegister(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('login')->with('Registrtion successfull');
    }
}
