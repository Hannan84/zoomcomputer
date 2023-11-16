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
    <table class="table table-hover">
        <thead class="table-primary table-responsive-sm text-center text-capitalize">
            <tr class="text-center">
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>OrderId</th>
                <th>Pay Mode</th>
                <th>Date</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Item</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="text-center">
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td style="color:red">{{ $order->order_code }}</td>
                <td>{{ $order->pay_type }}</td>
                <td>{{ date_format($order['created_at'],"Y-m-d") }}</td>
                <td>
                    @if($order->order_status == 'canceled')
                    <span style="color:red">{{ $order->order_status }}</span>
                    @elseif($order->order_status == 'accepted')
                    <span style="color:green">{{ $order->order_status }}</span>
                    @elseif($order->order_status == 'delivered')
                    <span style="color:green">{{ $order->order_status }}</span>
                    @else
                    <span>{{ $order->order_status }}</span>
                    @endif
                </td>
                <td>
                    @if($order->payment_status == 'canceled')
                    <span style="color:red">{{ $order->payment_status }}</span>
                    @elseif($order->payment_status == 'accepted')
                    <span style="color:green">{{ $order->payment_status }}</span>
                    @else
                    <span>{{ $order->payment_status }}</span>
                    @endif
                </td>
                <td>
                    <table class="table">
                        <thead class="table-secondary table-responsive-sm text-center text-capitalize">
                            <tr class="text-center">
                                <th>Model</th>
                                <th>Price</th>
                                <th>Offer</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($orderDetails as $key => $detail)
                                @php $total += $detail->total @endphp
                                @if ($order->id == $detail->order_id)
                                    <tr class="text-center">
                                        <td>{{ $detail->model }}</td>
                                        <td>{{ $detail->price }} tk</td>
                                        <td>{{ $detail->offer }} tk</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ $detail->total }} tk</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tr>
                            <th colspan="4">Total</th><th>{{ number_format(floatval($total), 2, '.') }} Tk</th>
                        </tr>
                    </table>
                </td>
                <td>
                <a href="{{ route('admin.edit.order',$order->id) }}" class="btn btn-success" title="update"><i class="fa fa-wrench"></i></a>
                <a href="{{ route('admin.delete.order',$order->id) }}" class="btn btn-danger mt-1" title="delete" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection