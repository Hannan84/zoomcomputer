@extends('website.master')
@section('contents')
    <!-- featured product -->

    <section class="featured-Product border">
        <div class="productHeader">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-capitalize">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">offers</li>
                </ol>
            </nav>
            <p class="text-center">অফারের অফারগুলো দেখতে নিচে স্ক্রল করুন &nbsp;⬇️</p>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($offers as $offer)
                    <div class="col-6 col-lg-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <a href="#" style="color:black;">
                                    <img src="{{ asset('/uploads/offer/' . $offer->image) }}" alt=""
                                        class="img-fluid w-100"><br><br>
                                    <p>{{ $offer->title }}</p>
                                </a>
                                <span class="text-secondary font-italic">
                                    {{ $offer->short_details }}
                                </span>
                                <br><br>
                                <a href="{{ route('website.offer.details', $offer->id) }}" class="btn btn-primary">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br><br>
    </section>
@endsection
