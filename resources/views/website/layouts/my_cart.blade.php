@extends('website.master')
@section('contents')
    <br><br><br>
    <div class="container">
        @if ($carts)
            <div class="row">
                <div class="col-12 d-flex justify-content-end text-capitalize">
                    <a href="{{ route('user.checkout') }}" class="btn btn-success">checkout</a>
                    <a href="{{ route('clear.cart') }}" class="btn btn-danger ml-2">clear cart</a>
                </div>
                <div class="col-12">
                    <div class="text-capitalize">
                        <table class="table table-hover table-responsive text-center">
                            <thead class="border">
                                <tr>
                                    <th>SL</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>offer</th>
                                    <th>quantity</th>
                                    <th>total price</th>
                                    <th>action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($carts as $key => $cart)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="word-wrap: break-word;" width="200">{{ $cart['product_name'] }}</td>
                                        <td>{{ $cart['regular_price'] }} tk</td>
                                        <td>{{ $cart['product_offer'] }} tk</td>
                                        <td>{{ $cart['product_quantity'] }}</td>
                                        <!-- <td><input type="number" min="1" name="quantity" class="form-control w-50" style="display:inline-block;"
                                            value="{{ $cart['product_quantity'] }}"></td> -->
                                        <td>
                                            {{ ($cart['regular_price'] * $cart['product_quantity']) -  $cart['product_offer']}} tk
                                        </td>
                                        <td>
                                            <a href="{{ route('user.remove.cart', $key) }}" class="btn btn-light">
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
        @else
            <br><br><br>
            <div class="text-center bg-warning p-3 rounded font-weight-bold">
                No product into the cart !
            </div>
        @endif
    </div>
    <br><br><br><br><br><br>
@endsection
