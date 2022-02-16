<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    public function index(){
        return view('fontend.index');
    }

    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile(){
        $user = User::find(Auth::user()->id);
        return view('fontend.profile.update_profile',compact('user'));
    }

    public function updateUserProfile(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function updateUserPassword(){
        $user = User::find(Auth::user()->id);
        return view('fontend.profile.change_user_password');
    }

    public function changeUserPassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $oldPass = User::find(Auth::user()->id)->password;
        if(Hash::check($request->current_password,$oldPass)){
            $pass = User::find(Auth::user()->id);
            $pass->password = Hash::make($request->password);
            $pass->save();
            Auth::logout();
        $notification = array(
            'message' => 'User Update Password Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('user.logout')->with($notification);
        }else{
            $notification = array(
                'message' => 'Current User Password Invaled',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }
}
