@extends('website.master')
@section('contents')
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h4 class="mb-0">Biling Details</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.placeOrder') }}" method="POST" class="mb-0">
                        @csrf
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                <label class="form-label" for="name1">Customer Name <span style="color:red">*</span></label>
                                <input type="text" name="name" id="name1" value="{{ $user->name }}" class="form-control input-custom" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control input-custom" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                <label class="form-label" for="inputAddress">Billing Address <span style="color:red">*</span></label>
                                <input type="text" id="inputAddress" name="address" value="{{ $user->address }}" class="form-control input-custom"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                <label class="form-label" for="phone">Phone Number <span style="color:red">*</span></label>
                                <input type="number" id="phone" name="phone" value="{{ $user->phone }}" class="form-control input-custom" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-check">
                                <label class="form-check-label" for="sslCommerze">SSL Commerze</label>
                                <input class="" type="radio" name="payType" id="sslCommerze" value="SSL Commerze" checked>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                <label class="form-check-label" for="handCash">Hand Cash</label>
                                <input class="" type="radio" name="payType" id="handCash" value="Hand Cash" checked>
                                <input class="" type="hidden" name="totalAmount" id="totalAmount" value="{{ ($subTotal + 80) - $offerTotal }}">
                                </div>
                            </div>
                        </div>

                        <div class="float-end ">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-rounded"
                            style="background-color: #0062CC ;">Place order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4" style="margin-top: 8px;">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Subtotal:
                            <span>{{number_format($subTotal, 2, '.', ',') }}<span style="font-size:23px">৳</span></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                            Total Offer:
                            <span>- {{number_format($offerTotal, 2, '.', ',') }}<span style="font-size:23px">৳</span></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Shipping Charge:
                            <span>80.00<span style="font-size:23px">৳</span></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                            <strong>Total amount:</strong>
                            <strong>
                                <p><small class="mb-0">(including VAT)</small></p>
                            </strong>
                            </div>
                            <span><strong>{{number_format(($subTotal + 80) - $offerTotal, 2, '.', ',') }}<span style="font-size:23px">৳</span></strong></span>
                        </li>
                    </ul>

                    <!-- <button type="button" class="btn btn-primary btn-lg btn-block">
                    Make purchase
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>
@endsection