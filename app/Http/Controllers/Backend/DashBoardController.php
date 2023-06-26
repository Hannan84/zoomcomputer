<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function dashboard(){
        $total_product = Product::all()->count();
        $total_customer = User::where('role','user')->count();
        $total_order = Order::where('order_status','pending')->count();
        $total_revenue = Payment::where('amount')->sum('amount');
        return view('admin.layouts.dashboard',compact('total_product','total_customer','total_order','total_revenue'));
    }
}
