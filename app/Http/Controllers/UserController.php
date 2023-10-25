<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        $listings = Listing::all();
        return view('index', compact('listings'));
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
    public function profileIndex(User $user)
    {
        $listings = $user->listings()->paginate(5);

        $reputation = Auth::user()->reputation;
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
    public function firstTimeLog(User $user)
    {
        return view('user.newLogin', compact('user'));
    }
    public function suggestUsers(Request $request) {
        $query = $request->input('query');
        $users = User::where('username', 'like', "%$query%")
            ->orWhere('name', 'like', "%$query%")
            ->get();
        foreach ($users as $user) {
            $user->mention()->attach('comment_mentions', [
                'mentioned_user_id' => $user->id,
                'comment_id'  => $comment->id,
            ]);
        }
        return response()->json($users);
    }



}
