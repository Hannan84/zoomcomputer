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
                                        <td>{{ $order['order_status'] }}</td>
                                        <td>{{ $order['payment_status'] }}</td>
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
