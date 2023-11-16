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
            toastr()->success('Login Successful');
            return redirect()->route('admin.dashboard');
        }
        toastr()->error('Invalid Username or Password');
        return redirect()->back();
    }
    Public function logout(){
        Auth::logout();
        toastr()->success('Logout Successful');
        return redirect()->route('admin.login.form');
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
            toastr()->error('Incorrect current password');
            return redirect()->back();
        } else {
            // Passwords match and meet the validation criteria, so you can update the password here.
            $user = User::find(auth()->user()->id);
            $user->password = bcrypt($request->password);
            $user->save();
            toastr()->success('Password changed successful');
            return redirect()->route('admin.dashboard');
        }
    }
}
