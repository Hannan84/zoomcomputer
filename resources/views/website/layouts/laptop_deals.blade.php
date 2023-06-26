@extends('website.master')
@section('contents')
    <!-- title -->
    <section class="Laptop-Deal-title">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-capitalize">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">laptop</a></li>
                <li class="breadcrumb-item active" aria-current="page">deals</li>
            </ol>
        </nav>
        <br>
        <div class="container">
            <div class="title text-center p-4 border border-dark">
                <p>স্টার টেক অনলাইন শপ অথবা যেকোন আউটলেট থেকে Palit, MSI, ASUS সহ

                    জনপ্রিয় সব ব্র্যান্ডের গ্রাফিক্স কার্ড কিনলেই পাচ্ছেন সর্বোচ্চ ৯৫০০ টাকা পর্যন্ত মূল্যছাড়! এছাড়াও
                    সর্বোচ্চ ২৭০০০ টাকা মূল্যছাড়ে পাচ্ছেন আকর্ষনীয় সব ট্যাবলেট।
                </p> <br><br>
                <h2>অফারের পণ্যগুলো দেখতে নিচে স্ক্রল করুন &nbsp; ⬇️</h2>
            </div>
        </div>
    </section>
    <!-- laptop -->
    <section class="all-deals">
        <div class="dealsHeader">
            <h1>Ramadan Laptop Mega Deal</h1>
            <p>Get exciting discount on Graphics Card</p>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($laptopDeals as $deal)
                    <div class="col-6 col-lg-3">
                        <div class="card">
                            {{-- badge --}}
                            <p class="card-badge">
                                Save: {{ $deal['regular_price'] - ($deal['regular_price'] * $deal['product_offer']) / 100 }} ৳
                            </p>
                            {{-- image --}}
                            <div class="card-img">
                                <img src="{{ asset('uploads/products/' . $deal->product_image) }}">
                            </div>
                            {{-- cart body --}}
                            <div class="card-details">
                                <a href="{{ route('website.deals.details', $deal->id) }}">
                                    <p>
                                        {{ $deal->model }}
                                    </p>
                                    <span class="text-danger">Price: {{ $deal->regular_price }} ৳</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br><br><br><br>
    </section>
    <!-- Description -->

    <section class="descripiton">
        <div class="container">
            <h4 class="text-danger p-1 mt-4">ডিল ক্যাম্পেইনের শর্তাবলী: </h4>

            <article>
                Ramadan ডিল ক্যাম্পেইন এর কোনো পণ্যে অন্য কোনো অফার থাকলে তা প্রযোজ্য হবে না।
                Ramadan ডিল ক্যাম্পেইন এর পণ্য অবশ্যই অনলাইনে অর্ডার করতে হবে।
                বিকাশ পেমেন্টে একজন ক্রেতা ১ দিনে সর্বোচ্চ ২০০ টাকা এবং অফার চলাকালীন সময়ে সর্বোচ্চ ৩০০ টাকা পর্যন্ত
                ক্যাশব্যাক উপভোগ করতে পারবেন।
                নগদ পেমেন্টে অফার চলাকালীন সময়ে একজন ক্রেতা সর্বোচ্চ ৪০০ টাকা পর্যন্ত ক্যাশব্যাক উপভোগ করতে পারবেন।
                ক্যাশব্যাক অফারটি শুধুমাত্র বিকাশ / নগদ -এর গেটওয়ে পেমেন্টের ক্ষেত্রে প্রযোজ্য।
                Ramadan ক্যাম্পেইনের পণ্যসমূহে ফ্রি ডেলিভারি অফার প্রযোজ্য নয়। অর্ডারের পর ক্রেতাকে কল করে ডেলিভারি
                সংক্রান্ত সকল তথ্য জানিয়ে দেয়া হবে।
                কোন সঙ্গত কারনে এই ক্যাম্পেইনের পেমেন্ট রিফান্ড করা হলে তা সাধারণ রিফান্ড পলিসি প্রক্রিয়ায় সম্পন্ন হবে।
                এক্ষেত্রে ক্রেতা যে এমাউন্ট পেমেন্ট করেছে শুধুমাত্র তারই রিফান্ড প্রসেস করা হবে।
            </article>
        </div><br><br><br>
    </section>
@endsection
