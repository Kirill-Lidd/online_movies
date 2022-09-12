<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class VkAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('vkontakte')->redirect();
    }
    public function callback()
    {
        $getUser = Socialite::driver('vkontakte')->user();

        $name = $getUser->name;
        $email = $getUser->email;
        $password = Hash::make('12345678');

        $user = User::where('email', $email)->first();

        if($user){
            Auth::login($user);
            return redirect()->route('home_page');
        }else{
            $createUser = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
            Auth::login($createUser);
            return redirect()->route('home_page');
        }



    }
}
