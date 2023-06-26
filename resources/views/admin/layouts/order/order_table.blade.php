@extends('admin.master')
@section('contents')
<!-- Message -->
@if(session()->has('error'))
<p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
@if(session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif
<!-- end -->
<div class="manage_table">
    <table class="table table-borderless table-hover">
        <thead class="table-primary text-capitalize">
            <tr class="text-center">
                <th>customer id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Product id</th>
                <th>Name</th>
                <th>Model</th>
                <th>Price</th>
                <th>Offer</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Status</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="text-center">
                <td>{{ $order->customer_id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->product_id }}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->model }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->offer }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->order_status }}</td>
                <td>{{ $order->payment_status }}</td>

                <td>
                    @if($order->order_status == 'pending')
                    <a href="{{ route('admin.accept.order',$order->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                    <a href="{{ route('admin.reject.order',$order->id) }}" class="btn btn-danger mt-1"><i class="fa fa-times"></i></a>
                    @elseif($order->order_status == 'canceled')
                    <a href="{{ route('admin.accept.order',$order->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                    @elseif($order->order_status == 'accepted')
                    <a href="{{ route('admin.reject.order',$order->id) }}" class="btn btn-danger mt-1"><i class="fa fa-times"></i></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection