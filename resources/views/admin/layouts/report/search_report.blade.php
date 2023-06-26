@extends('admin.master')
@section('contents')
<!-- search -->
<section class="Search-Report">
    <h1 class="text-center m-4">Search to print report</h1>
    <form action="{{ route('admin.search.report') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <label for="from_date">From</label>
                    <input type="date" name="from_date" id="from_date" class="form-control" placeholder="First name">
                </div>
                <div class="col-4">
                    <label for="to_date">to</label>
                    <input type="date" name="to_date" id="to_date" class="form-control" placeholder="Last name">
                </div>
                <div class="col-3">
                    <input type="submit" class="form-control btn btn-info mt-3" value="Search">
                </div>
            </div>
        </div>
    </form>
</section>
<!-- table -->
@if(!empty($orders))
<section class="manage_table">
    <div id="divToPrint">
        <div class="report_header p-2">
            <h2 class="text-center">BGD Online Limited</h2>
        </div>
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
                    <td>{{ $order->order_status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<br><br>
<!-- button -->
<section class="print_button">
    <button onclick="printReport()" class="btn btn-warning text-white w-25 float-end">Print Now</button>
</section>
<!-- No order -->
@else
<br>
<h3 class="bg-danger text-center p-1 rounded text-white">
    No orders
</h3>
@endif
<br><br>
@endsection

<!-- script file -->
<script type="text/javascript">
    function printReport() {
        var divToPrint = document.getElementById('divToPrint');
        var popupwin = window.open('', '_blank', 'width=1100, height=700');
        popupwin.document.open();
        popupwin.document.write('<html><head><link href="http://127.0.0.1:8000/Backend/css/style.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupwin.document.close();
    }
</script>