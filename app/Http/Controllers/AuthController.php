<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
 
class AuthController extends Controller
{
   public function redirectFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook() {
         $user = Socialite::driver('facebook')->user();
         dd($user);
    }
}

