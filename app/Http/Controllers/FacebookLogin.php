<?php

namespace sesionfacebook\Http\Controllers;

use Illuminate\Http\Request;

use sesionfacebook\Http\Requests;

use sesionfacebook\Http\Controllers\FacebookController;
use Socialite;

class FacebookLogin extends Controller
{
    public function loginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

        public function callback(FacebookController $service)
        {
            $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
            auth()->login($user);
            return redirect()->to('/home');
        }
}
