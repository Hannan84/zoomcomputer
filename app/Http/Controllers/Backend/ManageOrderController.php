<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\orderDetails;
use App\Models\Stock;
use App\Notifications\OrderCancelNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ManageOrderController extends Controller
{
    public function manageOrder()
    {
        $orders = Order::all()->sortByDesc('created_at')->values();
        $orderDetails = orderDetails::all();
        return view('admin.layouts.order.order_table', compact('orders','orderDetails'));
    }
    public function orderEdit($id)
    {
        $order = Order::find($id);
        return view('admin.layouts.order.order_edit',compact('order'));
    }
    public function orderUpdate(Request $request,$id)
    {
        $order = Order::find($id);
        $order->update([
            'order_status' => $request->orderStatus,
            'payment_status' => $request->paymentStatus,
        ]);
        if($request->orderStatus == "accepted"){
            return redirect()->route('update.stock.after.order',$order->id);
        }else{
            toastr()->success("Order '$request->orderStatus' and Payment '$request->paymentStatus'");
            return redirect()->route('admin.manage.order');
        }
    }
    public function updateStock($id)
    {
        $orderDetails = orderDetails::where('order_id',$id)->get();
        foreach ($orderDetails as $detail){
            $stock = Stock::where('product_id', $detail->product_id)->get();
            foreach ($stock as $st_qty) {
                $st_qty->update([
                    'total_produce' => $st_qty->total_produce - $detail->quantity,
                ]);
            }
        }
        toastr()->success('Order accepted and Stock Updated');
        return redirect()->route('admin.manage.order');
    }
    public function deleteOrder($id)
    {
        $order = Order::find($id);
        // Notification::send($order, new OrderCancelNotification($order->model, $order->product_name, $order->price, $order->quantity));
        $order->delete();
        toastr()->warning('warning', 'Order Delete');
        return redirect()->route('admin.manage.order');
    }
}
