<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile(){
        $admins = Admin::find(1);
        return view('admin.admin_profile_view',compact('admins'));
    }

    public function editeProfile($id){
       $admin = Admin::find($id);
       return view('admin.admin_profile_edit',compact('admin'));
    }

    public function storeProfile(Request $request,$id){
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function changePass(){
        return view('admin.admin_change_pass');
    }

    public function updatePass(Request $request){

        $request->validate([
            'current_pass' => 'required',
            'password' => 'required|confirmed'
        ]);

        $dataPass = Admin::find(1)->password;
        if(Hash::check($request->current_pass,$dataPass)){
            $pass = Admin::find(1);
            $pass->password = Hash::make($request->password);
            $pass->save();
            Auth::logout();
        $notification = array(
            'message' => 'Admin Update Password Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.logout')->with($notification);
        }else{
            $notification = array(
                'message' => 'Current Admin Password Invaled',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function allUsers(){
        $users = User::latest()->get();
        return view('backend.users.all_users',compact('users'));
    }
}
