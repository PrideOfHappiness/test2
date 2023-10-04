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
                    'nama' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->getId(),
                    'status' => 'Users',
                    'providers' => 'Google',
                    'fotoUsers' => $googleUser->avatar,
                ]);
                file_put_contents('style/dist/img/' . $googleUser->id . '.jpg', $googleUser->avatar);

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
