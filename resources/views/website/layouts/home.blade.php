@extends('website.master')
@section('contents')
    <!-- See All Categories Button -->

    <section class="all-categories">
        <div class="container">
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
                        <a href="{{ route('show.category.product', $category->id) }}" class="btn btn-light m-1 text-uppercase">
                            {{ $category->category_name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Carousel  -->
    <section class="product-slider">
        <div class="container">
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
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img class="d-block w-100" style="height:500px" src="{{ asset('/uploads/offer/' . $offer) }}" alt="Slide" style="height: 520px;">
                                    </div>
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
            
                </div>
            </div>
        </div>
    </section>
    <!-- Category -->
    <section class="featured-Category">
        <div class="container">
            <!-- notice -->
            <div class="text_animation">
                <p id="pot"><?php echo date('jS F l'); ?>, Wellcome to {{ config('app.name') }}.
                Head Office: Shah Ali Plaza, 5th Floor, Shop No: 49, 80/A Mirpur 10, Dhaka 1216
                </p>
            </div>
            <div class="categoryHeader">
                <h2>Featured Category</h2>
                <p>Get Your Desired Product from Featured Category!</p>
            </div>
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
                    <div class="col-6 col-lg-3 d-flex align-items-stretch">
                        <div class="card">
                            <a href="{{ route('website.product.details', $product->id) }}" style="color:black;">
                                <div class="card-body font-weight-bold">
                                    <img style="height: 192px; width: 242px"
                                        src="{{ asset('uploads/products/' .explode('|',$product->product_image)[0]) }}" alt=""
                                        class="img-fluid"><br><br>
                                    <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        {{ $product->product_name }}</p>
                                    <p style="color:#d11d1d">
                                        {{ number_format($product->regular_price) }}<span style="font-size:1.5rem">৳</span>
                                    </p>

                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mb-4 mt-4"><a href="{{ route('website.all.product') }}"
                    class="view_all_product_button btn">View All Product</a>
            </div>
        </div>
    </section>
    <!-- Description -->
    <!-- <section class="company-descripiton border">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 font-weight-bold mt-4">
                    <h3>We provide more services <i class="fa fa-handshake-o" aria-hidden="true"></i> </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 p-2 mt-4">
                    <h5 class="text-capitalize"><i class="fa fa-asterisk" aria-hidden="true"></i> web hosting</h5><br>
                    <div class="description">
                        <article>
                            BGD Online Limited make registration of web hosting fast, secure, affordable and secure manner.
                            If you are looking to transfer hosting to shared, reseller , vps or dedicated server provider
                            with superb customer support and have a 99.99% uptime.
                        </article>
                    </div>
                </div>
                <div class="col-lg-12 p-2 mt-4">
                    <h5 class="text-capitalize"><i class="fa fa-asterisk" aria-hidden="true"></i> web development</h5>
                    <br>
                    <div class="description">
                        <article>
                            BGD Online Limited expertise in web development. We do outsourcing web design and provide
                            hosting services.We developcompany website , ecommerce solution, Content rich CMS web
                            application for the business needs.You find all service in here.
                        </article>
                    </div>
                </div>
                <div class="col-lg-12 p-2 mt-4">
                    <h5 class="text-capitalize"><i class="fa fa-asterisk" aria-hidden="true"></i> internet connectivity
                    </h5><br>
                    <div class="description">
                        <article>
                            Internet access is the process that enables individuals and organisations to connect to the
                            Internet using computer terminals, comters, mobile devices, sometimes via computer networks.
                            Once connected to the Internet,  users can access Internet services, such as email.
                        </article>
                    </div>
                </div>
                <div class="col-lg-12 p-2 mt-4">
                    <h5 class="text-capitalize"><i class="fa fa-asterisk" aria-hidden="true"></i> Domain Registration
                    </h5><br>
                    <div class="description">
                        <article>
                            We provide Bangladeshi .bd or .bangla and the all the popular domain registration services. Our
                            server uptime 99.99% compared top others. We ensure high server uptime with superb support. You
                            find all service in here.
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
    </section> -->
@endsection
