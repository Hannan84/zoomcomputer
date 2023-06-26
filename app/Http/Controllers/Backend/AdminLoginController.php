<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    Public function form(){
        return view('admin.pages.login');
    }
    Public function doLogin(Request $request){
        $adminPost = [
            'email'=>$request->username,
            'password'=>$request->password,
        ];
        if(Auth::attempt($adminPost)){
            return redirect()->route('admin.dashboard')->with('message','Login Successful');
        }
        return redirect()->back()->with('error','Invalid Username or Password');
    }
    Public function logout(){
        Auth::logout();
        return redirect()->route('admin.login.form')->with('message','Logout Successful');
    }
}
