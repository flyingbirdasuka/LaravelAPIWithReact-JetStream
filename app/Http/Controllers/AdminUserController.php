<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class AdminUserController extends Controller
{
    public function adminLogout(){
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function userProfile(){
    	$id = Auth::id();
    	$user = User::find($id);
    	return view('backend.user.user_profile')->with('user', $user);
    }

    public function userProfileEdit(){
    	$id = Auth::id();
    	$user = User::find($id);
    	return view('backend.user.user_profile_edit')->with('user', $user);
    }

    public function userProfileStore(Request $request){
        $data = User::find(Auth::id());
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.profile')->with($notification);
    }

    public function userChangePassword(){
        $id = Auth::id();
        $user = User::find($id);
        return view('backend.user.change_password')->with('user', $user);
    }

    public function userPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else {
            return redirect()->back();
        }
    }
}


