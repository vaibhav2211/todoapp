<?php

namespace App\Http\Controllers;

use App\Mail\forgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserProfileController extends Controller
{
    //getting user details for profile
    public function getProfile(){
        $user=User::select('name','email','profile')->find(session('id'));
        return view("profile",["user"=>$user]);
    }
    public function changePassword(Request $req){
        $req->validate([
            "password"=>"required|min:6"
        ]);
        $user=User::find(session('id'));
        $user->password=Hash::make($req->password);
        $user->save();
        return back()->with("message","Password Updated Successfully");
    }
    //updating user profile details
    public function updateUser(Request $req){
        $req->validate([
            "name"=>"required|min:6",
            "profile"=>"nullable|image|max:1024"
        ]);
        $user=User::find(session('id'));
        if($req->hasFile("profile")){
            $profile=$req->file('profile');
            $filename=$user->email.".".$profile->extension();
            $profile->move(public_path("images/"),$filename);
            $user->name=$req->name;
            $user->profile=$filename;
            $user->save();
            return back()->with("message","Details updated successfully");
        }else{
            $user->name=$req->name;
            $user->save();
            return back()->with("message","Details updated successfully");
        }
    }
    //sending reset password link to user
    public function forgotPassword(Request $req){
        $req->validate([
            "email"=>'required'
        ]);
        $user=User::where("email",$req->email)->first();
        if($user && $user->email_verified==1){
            Mail::to($req->email)->send(new forgotPasswordMail($user->token,$user->id));
        }
        return back()->with("message","Link To Reset Password Is Sent To Mail!");
    }
    //show reset password form
    public function resetPasswordForm(Request $req){
        if($req->has('token')&&$req->has('userId')){
            $user=User::find($req->userId);
            if($user&&$user->token==$req->token){
                return view('resetPassword',["id"=>$user->id]);
            }else{
                return redirect("/");
            }
        }else{
            return redirect("/");
        }
    }
    //reseting password
    public function resetPassword(Request $req){
        $req->validate([
            "password"=>"required|min:6"
        ]);
        $user=User::find($req->id);
        $user->password=Hash::make($req->password);
        $user->save();
        return back()->with("message","Password Reset Successful!");
    }
}
