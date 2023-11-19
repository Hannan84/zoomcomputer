<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashBoardController extends Controller
{
    public function dashboard(){
        $total_product = Product::all()->count();
        $total_customer = User::where('role','user')->count();
        $total_order = Order::where('order_status','pending')->count();
        $order_delivered = Order::where('order_status','delivered')->count();
        $total_revenue = Order::where('payment_status','accepted')->sum('total');
        $today_revenue = Order::whereDate('created_at',Carbon::today())->sum('total');
        return view('admin.layouts.dashboard',compact('total_product','total_customer','total_order','order_delivered','total_revenue','today_revenue'));
    }
}
