@extends('website.master')
@section('contents')
    <section class="all-product border">
        <div class="productHeader">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-capitalize">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-filter"> filter</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">All-product</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row border border-warning rounded text-center">
                <div class="col-8 col-lg-4 d-flex">
                    <div class="m-2">
                        {{-- menu button for mobile --}}
                        <button type="button" class="btn btn-dark" id="mobileMenuFilter" data-toggle="collapse"
                            data-target="#mobileFilterItem">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <h4 class="m-2">Desktop</h4>
                </div>
                <div class="col-12 col-lg-4">
                    <h4 class="total_result">Total product found: {{ $result }}</h4>
                </div>
                <div class="col-6 col-lg-4">
                    {{-- shorting --}}
                    <div class="shorting d-flex justify-content-end">
                        <p class="mt-2">Shorted by:</p>
                        <div class="shortingPrice">
                            <div class="dropdown">
                                <button type="button" class="btn btn-light" data-toggle="dropdown">
                                    Price
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('website.all.product') }}">
                                        all
                                    </a>
                                    <a class="dropdown-item" href="{{ route('website.shorting.low.price') }}">
                                        Low(less 20K) </a>
                                    <a class="dropdown-item" href="{{ route('website.shorting.mid.price') }}">
                                        Mid(upto 50K) </a>
                                    <a class="dropdown-item" href="{{ route('website.shorting.high.price') }}">
                                        High(50K+)
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="allProductFilterItem">
            {{-- mobile filter items --}}
            <div class="first container collapse" id="mobileFilterItem">
                <form action="{{ route('user.filter.all.product') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 bg-white mt-2">
                            <h5 class="p-2 rounded">Availability</h5>

                            <h6><input type="checkbox" name="in_stock"> in stock</h6>
                            <h6><input type="checkbox" name="out_stock"> out of stock</h6>
                        </div>
                        <div class="col-12 bg-white mt-3">
                            <h5>Processor</h5>

                            @foreach ($processor as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach

                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>Display</h5>

                            @foreach ($display as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>memory</h5>

                            @foreach ($memory as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>graphics</h5>

                            @foreach ($graphics as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>operating system</h5>

                            @foreach ($operating as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>battery</h5>

                            @foreach ($battery as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-secondary" id="filterButton">Filter Result</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- desktop filter items --}}
            <div class="first container" id="desktopFilterItem">
                <form action="{{ route('user.filter.all.product') }}" method="POST">
                    @csrf
                    <div class="row ml-2">
                        <div class="col-12 bg-white mt-2">
                            <h5 class="p-2 rounded">Availability</h5>

                            <h6><input type="checkbox" name="in_stock"> in stock</h6>
                            <h6><input type="checkbox" name="out_stock"> out of stock</h6>
                        </div>
                        <div class="col-12 bg-white mt-3">
                            <h5>Processor</h5>

                            @foreach ($processor as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach

                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>Display</h5>

                            @foreach ($display as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>memory</h5>

                            @foreach ($memory as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>graphics</h5>

                            @foreach ($graphics as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>operating system</h5>

                            @foreach ($operating as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 bg-white rounded mt-3">
                            <h5>battery</h5>

                            @foreach ($battery as $value)
                                <h6><input type="checkbox" name="{{ $value }}" value="{{ $value }}">
                                    {{ $value }}</h6>
                            @endforeach
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-secondary" id="filterButton">Filter Result</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- product --}}
            <div class="second">
                <div class="container">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="column d-flex align-items-stretch">
                                <div class="box">
                                    <a href="{{ route('website.product.details', $product->id) }}">
                                        <div class="box_image">
                                            <img src="{{ asset('uploads/products/' . $product->product_image) }}">
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
            </div>
        </div>
        <br><br>
    </section>
@endsection
