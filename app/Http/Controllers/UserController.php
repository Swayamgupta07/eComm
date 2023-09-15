<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    function register(Request $req)
    {
        // return $req->input();
        $user=new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->name);
        $user->save();
        return redirect('/login');
    }
} 