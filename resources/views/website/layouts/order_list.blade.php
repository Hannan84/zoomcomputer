@extends('website.master')
@section('contents')
    @if ($orders)
        {
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-capitalize">
                        <table class="table table-hover table-responsive text-center">
                            <thead class="border">
                                <tr>
                                    <th>SL</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>

                                    <th>product_name</th>
                                    <th>price</th>
                                    <th>offer</th>
                                    <th>quantity</th>
                                    <th>total</th>
                                    <th>order_status</th>
                                    <th>payment_status</th>
                                    <th>action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order['name'] }}</td>
                                        <td>{{ $order['email'] }}</td>
                                        <td>{{ $order['phone'] }}</td>

                                        <td>{{ $order['product_name'] }}</td>
                                        <td> {{ $order['price'] }} tk</td>
                                        <td>{{ $order['offer'] }}</td>
                                        <td>{{ $order['quantity'] }}</td>
                                        <td>{{ $order['total'] }}</td>
                                        <td>
                                            @if($order->order_status == 'canceled')
                                            <span style="color:red">{{ $order->order_status }}</span>
                                            @elseif($order->order_status == 'accepted')
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
                                            <a href="#" class="btn btn-light">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        }
    @else{
        <div class="text-center bg-warning p-3 rounded font-weight-bold">
            No Orders into the order !
        </div>
        }
    @endif
@endsection
