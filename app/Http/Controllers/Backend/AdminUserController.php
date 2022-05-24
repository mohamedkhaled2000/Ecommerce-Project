<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ImageTrait;
use Illuminate\Support\Facades\File;

class AdminUserController extends Controller
{

    use ImageTrait;

    //// Roles Functions

    public function allRole(){
        $roles = Role::latest()->get();
        return view('backend.role_admin.role.all_roles',compact('roles'));
    }

    public function addRole(){
        return view('backend.role_admin.role.add_role');
    }


    public function storeRole(Request $request){

                $request->validate([
                    'name' => 'required',
                    'permission' => 'required|array',
                ]);

                $this->proccess(new Role, $request);

                $notification = array(
                    'message' => 'Role Added Successfly',
                    'alert-type' => 'success'
                );
                return redirect()->route('all.roles')->with($notification);
    }

    public function editRole($id){
        $role = Role::findOrFail($id);
        return view('backend.role_admin.role.edit_role',compact('role'));
    }

    public function updateRole(Request $request ,$id){
        $request->validate([
            'name' => 'required',
            'permission' => 'required|array',
        ]);

        $role = Role::findOrFail($id);

        $this->proccess($role, $request);


        $notification = array(
            'message' => 'Role Updates Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function deleteRole($id){
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Deleted Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    protected function proccess(Role $role, Request $r){
        $role -> name = $r -> name;
        $role -> permission = json_encode($r -> permission);
        $role -> save();
        return $role;
    }
    ////// Admin Functions

    public function allAdmin(){
        $admins = Admin::where('id','<>',Auth::id())->latest()->get();
        return view('backend.role_admin.admin.all_admin',compact('admins'));
    }

    public function addAdmin(){
        $roles = Role::latest()->get();
        return view('backend.role_admin.admin.add_admin',compact('roles'));
    }

    public function storeAdmin(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        $img_url = $this->saveImage($request->file('profile_photo_path'),'upload/admin_images/');

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'profile_photo_path' => $img_url,
            'role_id' => $request->role_id,
        ]);

        $notification = array(
            'message' => 'Admin Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function editAdmin($id){
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        return view('backend.role_admin.admin.edit_admin',compact('admin','roles'));
    }

    public function updateAdmin(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $admin = Admin::finOrFail($id);
        if($request->file('profile_photo_path')){
            if(File::exists($admin->profile_photo_path)){
                File::delete($admin->profile_photo_path);
            }
            $img_url = $this->saveImage($request->file('profile_photo_path'),'upload/admin_images/');

            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'profile_photo_path' => $img_url,
                'role_id' => $request->role_id,
            ]);

            $notification = array(
                'message' => 'Admin Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('all.admin')->with($notification);
        }else{
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role_id' => $request->role_id,
            ]);

            $notification = array(
                'message' => 'Admin Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('all.admin')->with($notification);
        }


    }

    public function deleteAdmin($id){
        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin Deleted Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
