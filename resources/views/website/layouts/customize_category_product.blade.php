@extends('website.master')
@section('contents')
    <section class="featured-Product border" id="featured_product">
        <div class="productHeader">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-capitalize">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">customization</a></li>
                    <li class="breadcrumb-item active" aria-current="page">product</li>
                </ol>
            </nav>
        </div>
        <div class="product">
            <div class="row">
                @foreach ($products as $product)
                    <div class="column d-flex align-items-stretch">
                        <div class="box">
                            <a href="{{ route('website.product.details', $product->id) }}">
                                <div class="img-box">
                                    <img src="{{ asset('uploads/customization/products/' . $product->image) }}"
                                        class="img-fluid">
                                </div>
                            </a>
                            <div class="detail-box">
                                <h5 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                    Model: {{ $product->model }}
                                </h5>
                                <h6>
                                    Price: {{ $product->price }}
                                </h6>
                                <a href="{{ route('user.add.customize.product', $product->id) }}"
                                    class="btn btn-primary">Add</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="float-right mr-4">
            {{ $products->links() }}
        </div>
        <br><br>
    </section>
@endsection
