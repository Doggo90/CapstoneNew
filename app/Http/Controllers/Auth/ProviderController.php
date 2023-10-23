<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect(){
            return Socialite::driver('google')->redirect();
    }
    public function callback() {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('google_id', $googleUser->id)->first();

        if (!$user) {
            // User doesn't exist, create a new user
            $user = User::create([
                'google_id' => $googleUser->id,
                'name' => $googleUser->name,
                'username' => User::generateUsername($googleUser->nickname),
                'email' => $googleUser->email,
                'google_token' => $googleUser->token,
                'photo' => $googleUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect('/new-login')->with('message', 'Welcome! You are now logged in.');
        } else {
            // User already exists, log them in
            Auth::login($user);
            return redirect('/index')->with('message', 'Logged in Successfully');
        }
    }

}
