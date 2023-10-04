<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;

class AgentController extends Controller
{
    public function index(){
        $listings = Listing::all();
        $reputation = Auth::user()->reputation;
        $postsCount = user()->$listing->count();
        return view('index', compact('listings', 'reputation', 'postsCount'));
    }//End Method
    public function show($id){

        $listing = Listing::find($id);
        return view('user.listing')->with('listing');
    }//End Method
    public function Logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/index')->with('message','Logged out successfully!');
    }//End Method
    public function profileIndex(User $user, Listing $listing)
    {
        $listings = $user->listings()->paginate(5);

        return view('user.user_profile', compact('user', 'listings'));
    }
    public function storePhone(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data -> phone = $request -> phone;
        $data ->save();
        return redirect()->back()->with('message','Phone Registered Successfully!');;
    }


}
