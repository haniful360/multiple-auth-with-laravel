<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class AuthController extends Controller
{

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        // dd( $request->all());

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            return redirect()->route('dashboard');
        } else {
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

        return redirect()->route('login')->with('success', 'Registrtion successfull');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session and regenerate the CSRF token
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully!');
    }

}
