<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function viewReport()
    {
        $orders = Order::where('order_status','pending')->get();
        return view('admin.layouts.report.report_table', compact('orders'));
    }
    public function searchReport(Request $request){
        $from = $request->from_date;
        $to = $request->to_date;
        if($from && $to){
            $orders = Order::whereDate('created_at',[$from, $to])->get();
            return view('admin.layouts.report.search_report', compact('orders'));
        }else{
            return view('admin.layouts.report.search_report');
        }
    }
    // other where clause: whereBetween, whereIn, whereNotIn, whereNull, whereNotNull, whereDate, whereMonth, whereDay, whereYear, whereTime, whereColumn , whereExists, whereRaw.
}
