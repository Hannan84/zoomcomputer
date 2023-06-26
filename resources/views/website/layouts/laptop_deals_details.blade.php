@extends('website.master')
@section('contents')
    <section class="Product-Details">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-capitalize">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">laptop-deals</a></li>
                <li class="breadcrumb-item active" aria-current="page">details</li>
            </ol>
        </nav>
        <div class="container">
            <div class="col-lg-12  p-3 main-section bg-white">
                <div class="row">
                    <div class="col-lg-6 left-side-product-box pb-3">
                        <img src="{{ asset('/uploads/products/' . $product->product_image) }}" class=" p-3">
                        <span class="sub-img">
                            <img src="{{ asset('/uploads/products/' . $product->product_image) }}" class=" p-2">
                            <img src="{{ asset('/uploads/products/' . $product->product_image) }}" class=" p-2">
                        </span>
                    </div>
                    <div class="col-lg-6 text-capitalize">
                        <div class="right-side-pro-detail p-3">
                            <div class="row">
                                <div class="model col-lg-12 font-italic">
                                    <h2 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        {{ $product->model }} &nbsp; {{ $product->product_name }}
                                    </h2>
                                </div>
                                <div class="col-lg-12">
                                    <p class=" p-0 price-pro">Price: {{ $product->regular_price }} ৳</p>
                                    <hr class="p-0 ">
                                </div>
                                <div class="col-lg-12 pt-2">
                                    <h5>Product Detail</h5>
                                    <span style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        {{ $product->product_description }}
                                    </span>
                                    <hr class=" pt-2 mt-2">
                                </div>
                                <!-- stock -->
                                <div class="col-lg-12">
                                    @foreach ($stocks as $stock)
                                        @if ($stock->total_produce == 0)
                                            <p class="tag-section"><strong>Availability : </strong><span
                                                    class="bg-danger text-white p-1 rounded">Out of Stock </span></p>
                                        @else
                                            <p class="tag-section"><strong>Availability : </strong><span
                                                    class="bg-secondary text-white p-1 rounded">Total-In-Stock :
                                                    {{ $stock->total_produce }}</span></p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <h6>Quantity :</h6>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="row ">
                                        <div class="col-lg-6 ">
                                            <form action="{{ route('website.order.form', $product->id) }}" method="GET">
                                                <input type="number" name="quantity"
                                                    class="form-control text-center w-100">
                                                <button type="submit" class="btn btn-success w-100 text-center mt-2">
                                                    Buy Now
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-lg-6 pb-2 mt-5 ">
                                            <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-info w-100">
                                                Add To Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="product-table">
            <h1 class="w-25 p-2 rounded">Specifications</h1>
            <!-- specifications -->
            <table class="table table-hover">
                <p class="bg-secondary text-white p-3 rounded">
                    Basic Information
                </p>
                <tbody>
                    <tr>
                        <td>Processor</td>
                        <td>
                            {{ $product->processor }}
                        </td>
                    </tr>
                    <tr>
                        <td>Display</td>
                        <td>{{ $product->display }}</td>
                    </tr>
                    <tr>
                        <td>Memory</td>
                        <td>{{ $product->memory }}</td>
                    </tr>
                    <tr>
                        <td>Storage</td>
                        <td>{{ $product->storage }}</td>
                    </tr>
                    <tr>
                        <td>Graphics</td>
                        <td>{{ $product->graphics }}</td>
                    </tr>
                    <tr>
                        <td>Operating System</td>
                        <td>{{ $product->operating_system }}</td>
                    </tr>
                    <tr>
                        <td>Battery</td>
                        <td>{{ $product->battery }}</td>
                    </tr>
                    <tr>
                        <td>Adapter</td>
                        <td>{{ $product->adapter }}</td>
                    </tr>
                    <tr>
                        <td>Audio</td>
                        <td>{{ $product->audio }}</td>
                    </tr>
                </tbody>
            </table>
            <!-- input device -->
            <table class="table table-hover">
                <p class="bg-secondary text-white p-3 rounded">
                    input device
                </p>
                <tbody>
                    <tr>
                        <td>Keyboard</td>
                        <td>{{ $product->keyboard }}</td>
                    </tr>
                    <tr>
                        <td>Optical drive</td>
                        <td>{{ $product->optical_drive }}</td>
                    </tr>
                    <tr>
                        <td>WebCam</td>
                        <td>{{ $product->webcam }}</td>
                    </tr>
                </tbody>
            </table>
            <!-- Network & Wireless Connectivity -->
            <table class="table table-hover">
                <p class="bg-secondary text-white p-3 rounded">
                    Network & Wireless Connectivity
                </p>
                <tbody>
                    <tr>
                        <td>Wi-fi</td>
                        <td>{{ $product->wifi }}</td>
                    </tr>
                    <tr>
                        <td>Bluetooth</td>
                        <td>{{ $product->bluetooth }}</td>
                    </tr>
                </tbody>
            </table>
            <!-- Ports, Connectors & Slots -->
            <table class="table table-hover">
                <p class="bg-secondary text-white p-3 rounded">
                    Ports, Connectors & Slots
                </p>
                <tbody>
                    <tr>
                        <td>USB</td>
                        <td>{{ $product->USB }}</td>
                    </tr>
                    <tr>
                        <td>HDMI</td>
                        <td>{{ $product->HDMI }}</td>
                    </tr>
                    <tr>
                        <td>VGA</td>
                        <td>{{ $product->VGA }}</td>
                    </tr>
                    <tr>
                        <td>Audio Jack Combo</td>
                        <td>{{ $product->audio_jack_combo }}</td>
                    </tr>
                </tbody>
            </table>
            <!-- Physical Specification -->
            <table class="table table-hover">
                <p class="bg-secondary text-white p-3 rounded">
                    Physical Specification
                </p>
                <tbody>
                    <tr>
                        <td>Dimensions (W x D x H)</td>
                        <td>{{ $product->dimensions }}</td>
                    </tr>
                    <tr>
                        <td>weights</td>
                        <td>{{ $product->weight }}</td>
                    </tr>
                    <tr>
                        <td>color</td>
                        <td>{{ $product->colors }}</td>
                    </tr>
                </tbody>
            </table>
            <!--  Warranty -->
            <table class="table table-hover">
                <p class="bg-secondary text-white p-3 rounded">
                    Warranty
                </p>
                <tbody>
                    <tr>
                        <td>Manufacturing Warranty</td>
                        <td>{{ $product->manufacturing_warranty }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
