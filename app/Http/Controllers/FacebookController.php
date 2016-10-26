<?php

namespace sesionfacebook\Http\Controllers;

use Illuminate\Http\Request;

use sesionfacebook\Http\Requests;

use Laravel\Socialite\Contracts\User as ProviderUser;
use sesionfacebook\FacebookModal;
use sesionfacebook\User;

class FacebookController extends Controller
{
	public function createOrGetUser(ProviderUser $providerUser)
	    {
	        $account = FacebookModal::where('proveedor','facebook')
	            ->where('idProveedor', $providerUser->getId())
	            ->first();


	        $arregloSesion = $providerUser->getRaw(); // Devuelve el arreglo con lo básico del usurio
	        // GET /oauth/access_token?  
	        //     grant_type=fb_exchange_token&amp;           
	        //     client_id={1777392115863720}&amp;
	        //     client_secret={91ccda6a9299989bad6fdd3ef7851be0}&amp;
	        //     fb_exchange_token={$providerUser->access_token}

	        if ($account) {
	            return $account->user;
	        } else {
	            $account = new FacebookModal([
	                'idProveedor' => $providerUser->getId(),
	                'proveedor' => 'facebook'
	            ]);

	            $user = User::whereEmail($providerUser->getEmail())->first();

	            if (!$user) {
	                $user = User::create([
	                    'email' => $providerUser->getEmail(),
	                    'name' => $providerUser->getName(),
	                ]);
	            }

	            $account->user()->associate($user);
	            $account->save();

	            return $user;

	        }

	    }

}
