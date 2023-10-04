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
 
        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'username' => User::generateUsername($googleUser->nickname),
            'email' => $googleUser->email,
            'google_token' => $googleUser->token,
            'photo' => $googleUser->getAvatar(),
        ]);
     
        Auth::login($user);
     
        return redirect('/index')->with('message', 'Logged in Successfully');
    }
    
}
