<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function userLogin(Request $req){
        $req->validate([
            "email"=>"required|email",
            "password"=>"required|min:6"
        ]);
        $user=User::select('id','name','email','password','email_verified')->where("email",$req->email)->first();
        //check if user exist
        if($user){
            $match=Hash::check($req->password,$user->password);
            //verifing user details
            if($user->email_verified==1 && $match){
                session()->put([
                    'isLogin'=>true,
                    "id"=>$user->id,
                    'name'=>$user->name,
                    "email"=>$user->email,
                    ]);
                return redirect("/");
            }
            else{
                return back()->with("message","Invalid User Details!");
            }
        }else{
            return back()->with("message","Invalid User Details!");
        }
    }
    public function logoutUser(){
        session()->flush();
        return redirect("/login");
    }
}
