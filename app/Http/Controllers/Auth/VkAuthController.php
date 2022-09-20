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

        $name = $getUser->user['first_name'];
        $email = $getUser->email;
        $password = Hash::make(rand(8,12));

        $user = User::where('email', $email)->first();

        if(!$user){
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
        }

        Auth::login($user);
        return redirect()->route('home_page');


    }
}
