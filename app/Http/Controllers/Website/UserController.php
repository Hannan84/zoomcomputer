<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function loginForm()
    {
        return view('website.pages.login');
    }
    public function doLogin(Request $request)
    {
        $request->validate([
            "email" => 'required',
            "password" => 'required',
        ]);
        $userData = $request->except('_token');
        if (Auth::attempt($userData)) {
            return redirect()->route('website.check.banned');
        } else {
            return redirect()->route('users.login.form')->with('error', 'Invalid username or password');
        }
    }

    public function checkBanned()
    {
        if (auth()->user()->status != 'active') {
            Auth::logout();
            return redirect()->route('users.login.form')->with('error', 'you have banned');
        } else {
            return redirect()->route('website.home')->with('message', 'Login Successful');
        }
    }

    public function registrationForm()
    {
        return view('website.pages.registration');
    }
    public function doRegistration(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "email" => 'required|unique:users',
            "password" => 'required',
            "confirm_password" => 'required',
            "address" => 'required',
            "phone" => 'required',
        ]);
        if ($request->password != $request->confirm_password) {
            return redirect()->back()->with('error', 'Invalid password');
        } else {
            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password = $request->confirm_password),
                "address" => $request->address,
                "phone" => $request->phone,
            ]);
            return redirect()->route('users.login.form')->with('message', 'You have registered. Now you can login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('website.home')->with('message', 'Logout successful');
    }

    //////////////////// profile //////////////////// 
    public function profile($id)
    {
        $user = User::find($id);
        $orders = Order::where('customer_id', '=', $id)->get();
        $total_product = Order::where('customer_id', $id)->count();
        return view('website.pages.profile', compact('user', 'orders', 'total_product'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('website.pages.edit_profile', compact('user'));
    }
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "address" => $request->address,
            "phone" => $request->phone,
        ]);
        return redirect()->route('user.profile', $user->id)->with('message', 'Profile Updated');
    }

    public function orderList($id)
    {
        $orders = Order::where('customer_id','=',$id)->get();
        return view('website.layouts.order_list',compact('orders'));
    }
    public function myCart()
    {
        $carts = session()->get('cart');
        return view('website.layouts.my_cart',compact('carts'));
    }
}
