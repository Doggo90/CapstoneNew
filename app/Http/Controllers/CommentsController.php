<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostNotification;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    public function mention(Comments $comments, User $user)
    {
        // Check if the user being mentioned exists.
        if (!$user->exists()) {
            abort(404);
        }

        // Add the user to the comment's mentions list.
        $comments->mentions()->attach($user);

        // Save the comment.
        $comments->save();

        // Return the comment.
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'comment_body' => 'required',
            'listing_id' => 'required',
            'user_id' => 'required',
        ]);
        $formFields['user_id'] = Auth::id();
        // $formFields['listing_id'] = Listing::id();
        $comment = Comments::create($formFields);

        if(auth()->user()->email != $comment->post->author->email){
            $comment->post->author->notify(new PostNotification($comment));
            
            return redirect()->route('listings.show', ['listing' => $formFields['listing_id']])
            ->with('message', 'Comment Posted Successfully!');
        }
        return redirect()->route('listings.show', ['listing' => $formFields['listing_id']])
        ->with('message', 'Comment Posted Successfully!');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
