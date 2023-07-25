<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $googleUser = Socialite::driver('google')->user();

            $userDB = User::where('google_id', $googleUser->getId())->first();

            if(!$userDB){
                $newUser = User::create([
                    'nama' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'status' => 'Users',
                ]);

                Auth::login($newUser);
                return redirect('/users/home');
            } else{
                Auth::login($userDB);
                return redirect('/users/home');
            }
        }catch (Throwable $th){
            dd($th->getMessage());
        }
    }
}
