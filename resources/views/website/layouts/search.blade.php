@extends('website.master')
@section('contents')
    <section class="featured-Product border" id="featured_product">
        <div class="productHeader">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-capitalize">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">search</li>
                </ol>
            </nav>
        </div>
        <div class="product_found">
            <h2 class="text-danger text-center py-4">Total searching result found: {{ $result }}</h2>
        </div>
        <div class="product">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="column d-flex align-items-stretch justify-content-center">
                        <div class="box">
                            <a href="{{ route('website.product.details', $product->id) }}">
                                <div class="img-box">
                                    <img src="{{ asset('uploads/products/' .explode('|',$product->product_image)[0]) }}"
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
                                <a href="{{ route('website.product.details', $product->id) }}" class="btn btn-secondary">
                                    Product Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
