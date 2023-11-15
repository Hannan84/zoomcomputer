@extends('website.master')
@section('contents')
<div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header" style="border-bottom: none; padding-bottom: 0;">
            <p>Order <span style="background: #f7f718;">#{{ $order->order_code }}</span> was placed on <span style="background: #f7f718;">{{ date_format($order->created_at,"Y-m-d") }}</span> and is currently <span style="background: #f7f718;">{{ $order->order_status }}</span></p>
            <a href="{{ url()->previous() }}" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div class="modal-header" style="padding-top: 0;">
            <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        </div>
        <div class="modal-header" style="padding-bottom: 0;">
            <h6>PRODUCT</h6>
            <h6>TOTAL</h6>
        </div>
        @php $subtotal = 0; @endphp
        @foreach ($orderDetails as $key => $detail)
            @php $subtotal += $detail->total @endphp
            <div class="modal-header" style="padding-bottom: 0; padding-top: 0;">
                <p>{{++$key.'. '. $detail->product_name .' x '. $detail->quantity}}pcs</p>
                <p>{{ number_format(floatval($detail->total), 2, '.', ',') }} Tk</p>
            </div>
        @endforeach
        <div class="modal-header" style="padding-bottom: 0; padding-top: 0;">
            <p>Subtoal</p>
            <p>{{ number_format(floatval($subtotal), 2, '.', ',') }} Tk</p>
        </div>
        <div class="modal-header" style="padding-bottom: 0; padding-top: 0;">
            <p>Delivery fee</p>
            <p>{{ number_format(80, 2) }} Tk</p>
        </div>
        <div class="modal-header" style="padding-bottom: 0; padding-top: 0;">
            <p>Payment method</p>
            <p>{{ $order->pay_type }}</p>
        </div>
        <div class="modal-header" style="padding-bottom: 0; padding-top: 0;">
            <p style="font-weight: bold;">Total</p>
            <p style="font-weight: bold;">{{ number_format(floatval($order->total), 2, '.', ',') }} Tk</p>
        </div>
        <div class="modal-body" style="padding-bottom: 0;">
            <h5 class="modal-title">Billing address</h5>
            <p style="margin-top: 0.5rem; margin-bottom: 0;">{{ $order->name }}</p>
            <p style="margin-bottom: 0;">{{ $order->address }}</p>
            <p style="margin-bottom: 0;">{{ $order->phone }}</p>
            <p style="">{{ $order->email }}</p>
        </div>
        </div>
    </div>
</div>
@endsection