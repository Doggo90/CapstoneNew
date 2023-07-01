<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(){
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }
    public function create(){
        return view('listings.create');
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'logo' => 'required',
            'tags' => 'required',
            'body' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo');
            $filename = date('YmdHi').$formFields['logo']->getClientOriginalName();
            $formFields['logo']->move(public_path('images'),$filename);
            $formFields['logo'] = $filename;
        }

        Listing::create($formFields);

        // $notification = array(
        //     'message' => 'Post Created Successfully',
        //     'alert-type' => 'success'
        // );
        return redirect('/index')->with('message', 'Post Created Successfully!');
    }
    public function edit(Listing $listing){

        return view('listings.edit', ['listing' => $listing]);
    }
    public function update(Request $request, Listing $listing ){
        $formFields = $request->validate([
            'title' => 'required',
            'logo' => 'required',
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
        return back()->with('message', 'Post Updated Successfully!');
    }
    public function delete(Listing $listing){
        $listing->delete();
        return redirect('/index')->with('message', 'Post Deleted Successfully');
    }
}
