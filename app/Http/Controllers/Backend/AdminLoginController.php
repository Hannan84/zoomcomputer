<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    // change password
    public function reset()
    {
        return view('admin.pages.reset');
    }
    // update password
    public function update_password(Request $request)
    {
        if ($request->password !== $request->con_password) {
            return redirect()->back()->with('error', 'Incorrect current password');
        } else {
            // Passwords match and meet the validation criteria, so you can update the password here.
            $user = User::find(auth()->user()->id);
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('admin.dashboard')->with('message', 'Password changed successful');
        }
    }
}
