@extends('website.master')
@section('contents')
    <!-- style="border:5px solid red;" -->
    <!-- Product Offer Details  -->
    <section class="product-offer">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-capitalize">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">offer</a></li>
                <li class="breadcrumb-item active" aria-current="page">details</li>
            </ol>
        </nav>
        <div class="container">
            <div class="offer">
                <div class="offer-deadline">
                    <h4 class="text-uppercase mt-2">offers ends in:</h4>
                    <div class="ml-3 mr-2 mt-2">
                        <h4 class="bg-danger p-1 text-white rounded">
                            {{ $offer->deadline }}
                        </h4>
                    </div>
                </div>
                <div class="offer-details">
                    <img src="{{ asset('/uploads/offer/' . $offer->image) }}" class="w-100 h-auto"><br><br>
                    <p>
                        {{ $offer->details }}
                    </p>
                    <span class="text-secondary">
                        {{ $offer->condition }}
                    </span>
                </div>
                <br> <br>
            </div>
        </div>
    </section>
@endsection
{{-- <script type="text">
    var offer = {!! json_encode($offer->deadline) !!};
    var deadline = document.getElementById('productDeadline');
</script> --}}
