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
            <div class="row">
                @foreach ($products as $product)
                    <div class="column">
                        <div class="box">
                            <a href="{{ route('website.product.details', $product->id) }}">
                                <div class="img-box">
                                    <img src="{{ asset('uploads/products/' . $product->product_image) }}" class="img-fluid">
                                </div>
                            </a>
                            <div class="detail-box">
                                <h5>
                                    Model: {{ $product->model }}
                                </h5>
                                <h6>
                                    Price: {{ $product->regular_price }}
                                </h6>
                                <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
