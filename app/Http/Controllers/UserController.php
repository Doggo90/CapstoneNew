<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $listings = Listing::all();
        return view('index', compact('listings'));
    }
    public function show($id){

        $listing = Listing::find($id);
        return view('user.listing')->with('listing');
    }
    public function Logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/index')->with('message','Logged out successfully!');
    }//End Method
}
