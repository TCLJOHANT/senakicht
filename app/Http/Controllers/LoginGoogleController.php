<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{
    // public function google()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function usergoogle()
    // {
    //     $user = Socialite::driver('google')->user();

    //     $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();

    //     if ($userExists) {
    //         Auth::login($userExists);
    //     } else {
    //         $userNew = User::create([
    //             'username' => $user->name,
    //             'email' => $user->email,
    //             'avatar' => $user->avatar,
    //             'external_id' => $user->id,
    //             'external_auth' => 'google',
    //         ]);
    //         Auth::login($userNew);
    //     }

    //     return redirect('home');
    // }
}
