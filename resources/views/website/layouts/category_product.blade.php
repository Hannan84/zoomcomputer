@extends('website.master')
@section('contents')
    <!-- sub-category product -->

    <section class="featured-Product border">
        <div class="productHeader">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-capitalize">
                    <li class="breadcrumb-item"><a href="{{ route('website.home') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$category->category_name}}</li>
                    <li class="breadcrumb-item active" aria-current="page">product</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="column d-flex align-items-stretch justify-content-center">
                        <div class="box">
                            <a href="{{ route('website.product.details', $product->id) }}">
                                <div class="img-box">
                                    <img src="{{ asset('uploads/products/' . $product->product_image) }}"
                                        class="img-fluid">
                                </div>
                            </a>
                            <div class="detail-box">
                                <h5 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                    {{ $product->model }}
                                </h5>
                                <li>
                                    Processor: {{ $product->processor }}
                                </li>
                                <li>
                                    RAM: {{ $product->memory }}
                                </li>
                                <li>
                                    Display: {{ $product->display }}
                                </li>
                                <h6 style="text-align:center; color:#d11d1d">
                                    {{ number_format($product->regular_price) }}<span style="font-size:1.5rem">৳</span>
                                </h6>
                                <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-secondary">
                                    Add To Cart
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br><br><br><br><br><br>
    </section>
@endsection
