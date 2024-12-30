<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = User::where('email', $providerUser->email)->first();

        if (!$user) {
            $user = User::updateOrCreate([
                'name' => $providerUser->name ?? $providerUser->nickname,
                'email' => $providerUser->email,
                // 'github_id' => $githubUser->id,
                'password' => bcrypt($provider),
            ]);
        }

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Logged in successfully!');
    }
}
