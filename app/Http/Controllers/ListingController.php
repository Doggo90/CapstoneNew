<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comments;
use App\Models\User;
use App\Http\Controllers\CommentsController;
use App\Models\Announcement;


class ListingController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'created_at');
        $announcements = Announcement::all();

        $listingsQuery = Listing::query();

        // Apply sorting based on the selected criteria
        if ($sortBy === 'title') {
            $listingsQuery->orderBy('title');
        } elseif ($sortBy === 'tags') {
            $listingsQuery->orderBy('tags');
        } elseif ($sortBy === 'created_at') {
            $listingsQuery->latest();
        }

        $listings = $listingsQuery->filter(request(['tag', 'search']))->get();
        return view('listings.index', compact('listings', 'sortBy', 'announcements'));
    }

    public function show(Listing $listing, Comments $comment){

        $users = User::all();
        $comments = Comments::with('author')->get();
        $userPhoto = User::pluck('photo');
        // dd($commentsAuthor);
        return view('listings.show', compact('listing', 'comments', 'userPhoto', 'users'));
    }
    public function create(){
        return view('listings.create');
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'body' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo');
            $filename = date('YmdHi').$formFields['logo']->getClientOriginalName();
            $formFields['logo']->move(public_path('images'),$filename);
            $formFields['logo'] = $filename;
        }
        $formFields['user_id'] = Auth::id();
        $user = auth()->user();
        $user->increment('reputation', 1);
        Listing::create($formFields);
        return redirect('/index')->with('message', 'Post Created Successfully!');
    }
    public function edit(Listing $listing){

        return view('listings.edit', ['listing' => $listing]);
    }
    public function update(Request $request, Listing $listing){
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'body' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo');
            $filename = date('YmdHi').$formFields['logo']->getClientOriginalName();
            $formFields['logo']->move(public_path('images'),$filename);
            $formFields['logo'] = $filename;
        }

        $listing->update($formFields);
        // $notification = array(
        //     'message' => 'Post Created Successfully',
        //     'alert-type' => 'success'
        // );
        // return back()->with('message', 'Post Updated Successfully!');
        // dd($listing);
        return redirect('/index')->with('message', 'Post Updated Successfully!');
    }
    public function delete(Listing $listing){
        $listing->delete();
        return redirect('/index')->with('message', 'Post Deleted Successfully');
    }
}
