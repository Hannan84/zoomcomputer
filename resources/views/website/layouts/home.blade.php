@extends('website.master')
@section('contents')
    <!-- See All Categories Button -->

    <section class="all-categories">
        {{-- desktop --}}
        <div class="desktop_all_categories category p-lg-1">
            @foreach ($categories as $category)
                <div class="btn-group">
                    <a href="{{ route('show.category.product', $category->id) }}" class="btn btn-light m-1 text-uppercase">
                        {{ $category->category_name }}
                    </a>
                </div>
            @endforeach
        </div>
        {{-- mobile --}}
        <button class="btn mobile_all_categories" type="button" data-toggle="collapse" data-target="#category">
            See All Categories &rarr;
        </button>
        <div class=" collapse category p-lg-1" id="category">
            @foreach ($categories as $category)
                <div class="btn-group">
                    @foreach ($categories as $category)
                        <div class="btn-group">
                            <a href="{{ route('show.category.product', $category->id) }}" class="btn btn-light m-1 text-uppercase">
                                {{ $category->category_name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
    <!-- Carousel  -->
    <section class="product-slider">
        <div class="slider">
            <div class="row">
                <div class="col">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($offers_image as $key => $offer)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($offers_image as $offer)
                                @if ($loop->first)
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('/uploads/offer/' . $offer) }}"
                                            alt="First slide">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/uploads/offer/' . $offer) }}"
                                            alt="First slide">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- compare product -->
                <!-- <div class="col-lg-4 mt-4">
                    <div class="compare-product text-center">
                        <h3 class="pt-1">Compare Product</h3>
                        <p>Choose two product to compare</p>
                        <form action="" class="form-inline my-2 my-lg-0">
                            <input type="search" name="search_c1" value="" placeholder="Search"
                                class="form-control m-2 w-100" aria-label="Search">
                            <input type="search" name="search_c2" value="" placeholder="Search"
                                class="form-control m-2 w-100" aria-label="Search">
                            <br>
                            <input type="submit" class="bg-secondary p-2 border text-white w-100">
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- notice -->
    <div class="text_animation">
        <p id="pot">26th July Tuesday, our all branches are open except Multiplan Branch.
            Additionally our online activities will remain open and operational.
        </p>
    </div>
    <!-- Category -->
    <section class="featured-Category">
        <div class="categoryHeader">
            <h2>Featured Category</h2>
            <p>Get Your Desired Product from Featured Category!</p>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-2 mt-2">
                        <div class="category_card">
                            <a href="{{ route('show.category.product', $category->id) }}">
                                <div class="category_card_img">
                                    <img src="{{ asset('/uploads/category/' . $category->image) }}" alt="">
                                </div>
                                <div class="category_card_details">
                                    <p>{{ $category->category_name }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br><br><br><br><br><br>
    </section>
    <!-- product -->
    <section class="featured-Product border">
        <div class="productHeader">
            <h2>Featured Product</h2>
            <p>Check & Get Your Desired Product !</p>
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
                                <h6>
                                    Price: {{ $product->regular_price }}
                                </h6>
                                <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning">
                                    Add To Cart
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mb-4"><a href="{{ route('website.all.product') }}" class="view_all_product_button btn">View All Product</a>
            </div>
        </div>
    </section>
    <!-- Description -->
    <section class="company-descripiton border">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 font-weight-bold mt-4">
                    <h1>We provide more services <i class="fa fa-handshake-o" aria-hidden="true"></i> </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 p-2 mt-4">
                    <h3 class="text-capitalize"><i class="fa fa-asterisk" aria-hidden="true"></i> web hosting</h3><br>
                    <div class="description">
                        <article>
                            BGD Online Limited make registration of web hosting fast, secure, affordable and secure manner.
                            If you are looking to transfer hosting to shared, reseller , vps or dedicated server provider
                            with superb customer support and have a 99.99% uptime.
                        </article>
                    </div>
                </div>
                <div class="col-lg-12 p-2 mt-4">
                    <h3 class="text-capitalize"><i class="fa fa-asterisk" aria-hidden="true"></i> web development</h3>
                    <br>
                    <div class="description">
                        <article>
                            BGD Online Limited expertise in web development. We do outsourcing web design and provide
                            hosting services.We developcompany website , ecommerce solution, Content rich CMS web
                            application for the business needs.You find all service in here
                        </article>
                    </div>
                </div>
                <div class="col-lg-12 p-2 mt-4">
                    <h3 class="text-capitalize"><i class="fa fa-asterisk" aria-hidden="true"></i> internet connectivity
                    </h3><br>
                    <div class="description">
                        <article>
                            Internet access is the process that enables individuals and organisations to connect to the
                            Internet using computer terminals, computers, mobile devices, sometimes via computer networks.
                            Once connected to the Internet, users can access Internet services, such as email. </article>
                    </div>
                </div>
                <div class="col-lg-12 p-2 mt-4">
                    <h3 class="text-capitalize"><i class="fa fa-asterisk" aria-hidden="true"></i> Domain Registration
                    </h3><br>
                    <div class="description">
                        <article>
                            We provide Bangladeshi .bd or .bangla and the all the popular domain registration services. Our
                            server uptime 99.99% compared to others. We ensure high server uptime with superb support.You
                            find all service in here
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
    </section>
@endsection
