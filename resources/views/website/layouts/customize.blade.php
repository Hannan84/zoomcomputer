@extends('website.master')

@section('contents')
    <div id="invoice">
        <div class="toolbar hidden-print">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-capitalize">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">customization</li>
                </ol>
            </nav>
            <div class="text-right">
                <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
            </div>
            <hr>
        </div>
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">
                                <h2>Build your own PC- Zoom Computer</h2>
                            </div>
                            <h4 class="to">Md. Selim hossain suhag</h4>
                            <div class="address">Address</div>
                            <div class="email"><a href="#">exapmple@example.com</a></div>
                        </div>
                        <div class="col invoice-details">
                            <h3 class="invoice-id">Total Amount: 0000 TK</h3>
                            <div class="date">Total items: 000</div>
                        </div>
                    </div>
                    <hr>
                    <div class="my_customization text-center">
                        @if (!$categories)
                            <h3 class="text-danger font-weight-bold">My Customization</h3>
                            {{-- form --}}
                            <form action="{{ route('user.order.customize.product') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>price</th>
                                            <th>description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><input type="image" name="image" alt="image" disabled></td>
                                            <td><input type="text" name="name" value="" disabled></td>
                                            <td><input type="text" value="" disabled></td>
                                            <td><input type="text" value="" disabled></td>
                                            <td><a href="#"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="border border-secondary">
                                                <button type="submit" class="btn btn-warning text-white w-25">Order
                                                    Now</button>
                                            </td>
                                        </tr>

                                    </tfoot>
                                </table>
                            </form>
                        @else
                            <div>
                                <p class="bg-warning text-white p-2">Please! Select customization product from bellow &nbsp;
                                    <i class="fa fa-arrow-down"></i>
                                </p>
                            </div>
                        @endif
                    </div>
                    <hr>
                    {{-- Category table --}}
                    <h2 class="text-center text-info font-weight-bold">Select Customize Product</h2>
                    <table border="0" class="text-center" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                                <th>Select</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="no">
                                        <img src="{{ asset('/uploads/customization/category/' . $category->image) }}"
                                            alt="image">
                                    </td>
                                    <td>{{ $category->customize_category_name }}</td>
                                    <td></td>
                                    <td></td>
                                    <td class="total"><a href="{{ route('customize.category.product', $category->id) }}"
                                            class="btn btn-info">Choose</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <br><br><br><br>
                    <div class="thanks">Thank you!</div>
                    <div class="notices">
                        <div>NOTICE:</div>
                        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                    </div>
                </main>
                <footer>
                    Invoice was created on a computer and is valid without the signature and seal.
                </footer>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>
@endsection
