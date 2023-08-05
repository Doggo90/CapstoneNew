<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard(){
        
        return view('admin.index');

    }//End Method
    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }//End Method
    public function AdminLogin(){

        return view('admin.admin_login');

    }//End Method

    public function AdminProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));

    }//End Method
    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//End Method

    public function AdminChangePassword(){

        return view('admin.admin_change_password');

    }//End Method

    public function ManageRoles(){
        $usersQuery = User::query();
        $users = $usersQuery->filter(request(['search']))->get();
        $allUsers = User::get();
        return view('admin.roles.manage_roles', compact('users', 'allUsers'));

    }
    public function EditRoles($id){

        $user_id = User::findorfail($id);
        // $users = User::all();
        $roles = User::pluck('name', 'id');
        return view('admin.roles.edit_roles', compact('user_id','roles'));
    }
    public function UpdateRoles(Request $request){
        // dd($request);
        $data = User::findOrFail($request->id);
        $data->role = $request->role;
        $data->save();
        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/admin/roles/manage')->with($notification);
    }
}
