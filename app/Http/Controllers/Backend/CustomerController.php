<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function manageCustomer(){
        $users = User::where('role','user')->get();
        return view('admin.layouts.customer.customer_table',compact('users'));
    }

    public function banCustomer($id){
        $user = User::find($id);
        $user->update([
            'status'=>'disabled',
        ]);
        return redirect()->back()->with('error', 'Customer banned');
    }
    public function unBanCustomer($id){
        $user = User::find($id);
        $user->update([
            'status'=>'active',
        ]);
        return redirect()->back()->with('message', 'Customer Unbanned');
    }
}
