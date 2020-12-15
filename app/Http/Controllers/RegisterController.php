<?php

namespace App\Http\Controllers;

use App\Mail\verifyUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //registering new user
    public function registerUser(Request $req){
        $req->validate([
            "name"=>"required|min:5",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6",
            "profile"=>"nullable|image|mimes:jpg,jpeg,png|max:1024"
        ]);
        if($req->hasFile('profile')){
            $profile=$req->file('profile');
            $filename=$req->email.".".$profile->extension();
            $profile->move(public_path("/images"),$filename);
            $user=User::create([
                "name"=>$req->name,
                "email"=>$req->email,
                "password"=>Hash::make($req->password),
                "profile"=>$filename,
                "token"=>Str::random(25)
            ]);
        }else{
            $user=User::create([
                "name"=>$req->name,
                "email"=>$req->email,
                "password"=>Hash::make($req->password),
                "token"=>Str::random(25)
            ]);
        }
        Mail::to($req->email)->send(new verifyUser($user->id,$user->token));
        return back()->with("message","Mail has been sent! Please check your mail for verification");
    }
    //verifying the users
    public function verifyUser(Request $req){
        if($req->has('token')&&$req->has('userId')){
            $user=User::find($req->userId);
            if($user->token==$req->token){
                if($user->email_verified==0){
                    $user->email_verified=1;
                    $user->save();
                    return redirect("/login");
                }else{
                    return redirect('/');
                }
            }else{
                return redirect("/");
            }
        }else{
            return redirect("/");
        }
    }
}
