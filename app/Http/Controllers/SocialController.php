<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{


    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }


    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('email', $githubUser->email)->first();


        if(!$user){
            $user = User::updateOrCreate([
                'name' => $githubUser->name ?? $githubUser->nickname,
                'email' => $githubUser->email,
                // 'github_id' => $githubUser->id,
                'password' => bcrypt('github'),
            ]);
        }

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Logged in successfully!');
    }
}
