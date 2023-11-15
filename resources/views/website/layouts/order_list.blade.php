@extends('website.master')
@section('contents')
    @if ($orders)
    <br>
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="text-capitalize">
                        <table class="table table-hover table-responsive-sm text-center">
                            <thead class="border">
                                <tr>
                                    <th>SL</th>
                                    <th>OrderId</th>
                                    <th>Order Date</th>
                                    <th>total</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $order)
                                    <tr class="table-light">
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="color:red">{{ $order['order_code'] }}</td>
                                        <td>{{ date_format($order['created_at'],"Y-m-d") }}</td>
                                        <td>{{ $order['total'] }} Tk</td>
                                        <td>
                                            <span style="color:green">{{ $order->order_status }}</span>
                                        </td>
                                        <td>
                                            <a title="view" class="btn btn-light" href="{{ route('view.detail.list',$order->id) }}"> 
                                                <i class="fa fa-eye"></i>
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
    @else
        <div class="text-center bg-warning p-3 rounded font-weight-bold">
            No Orders into the order !
        </div>
        
    @endif
@endsection
