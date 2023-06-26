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
                    <div class="col-6 col-lg-3 d-flex align-items-stretch">
                        <div class="card">
                            <a href="{{ route('website.product.details', $product->id) }}" style="color:black;">
                                <div class="card-body font-weight-bold">
                                    <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt=""
                                        class="img-fluid"><br><br>
                                    <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        {{ $product->model }}</p>
                                    <span class="text-success">Price: {{ $product->regular_price }}</span>

                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br><br><br><br><br><br>
    </section>
@endsection
