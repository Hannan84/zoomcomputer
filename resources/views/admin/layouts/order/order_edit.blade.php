@extends('admin.master')
@section('contents')
<div class="container">
    <div class="manage_table">
        <form action="{{ route('admin.update.order',$order->id) }}" method="post">
            @csrf
            <div class="form-group w-50">
                <label for="orderStatus">Order Status:</label>
                <select class="form-control" name="orderStatus" id="orderStatus">
                    <option {{ $order->order_status=="pending"? 'selected':'' }} value="pending">pending</option>
                    <option {{ $order->order_status=="accepted"? 'selected':'' }} value="accepted">accepted</option>
                    @if ($order->order_status=="accepted")
                    <option {{ $order->order_status=="delivered"? 'selected':'' }} value="delivered">delivered</option>
                    @endif
                    <option {{ $order->order_status=="canceled"? 'selected':'' }} value="canceled">canceled</option>
                </select>
            </div>
            <div class="form-group w-50">
                <label for="paymentStatus">Payment Status:</label>
                <select class="form-control" name="paymentStatus" id="paymentStatus">
                    <option {{ $order->payment_status=="pending"? 'selected':'' }} value="pending">pending</option>
                    <option {{ $order->payment_status=="accepted"? 'selected':'' }} value="accepted">accepted</option>
                    <option {{ $order->payment_status=="canceled"? 'selected':'' }} value="canceled">canceled</option>
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection