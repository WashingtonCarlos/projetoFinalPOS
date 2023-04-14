<?php

namespace Frota\Http\Controllers;

use Exception;
use Frota\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;



class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            //dd($user);
            $isUser = Usuario::where('fb_id', $user->id)->first();
            //dd($isUser);
            if($isUser){
                Auth::login($isUser);
                return redirect()->route('usuario');
                //$objeto = JSON.stringify();
               //return redirect()->route('loginSocial',[$isUser->cpf,$isUser->password]);
            }else{
               $createUser = array([
                   'name' => $user->name,
                   'email' => $user->email,
                   'fb_id' => $user->id,
                    //'password' => encrypt('admin@123')
                ]);
                //dd($createUser);
                return view('ordinary.socialLogin')->with('social',$createUser);
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
