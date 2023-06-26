@extends('admin.master')
@section('contents')
<main style="background-color:#dfe6e9" class="h-100 w-100">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row text-center bg-light">
            <!-- cart-1-->
            <div class="col-xl-4 col-md-6 mt-4">
                <div class="text-white mb-4" style="background-color: #82589F;">
                    <div class="card-body">
                        <h5>Total Product</h5>
                    </div>
                    <div class="card-footer">
                        <p>{{ $total_product }}</p>
                    </div>
                </div>
            </div>
            <!-- cart-2 -->
            <div class="col-xl-4 col-md-6 mt-4">
                <div class="card text-white mb-4" style="background-color: #1abc9c;">
                    <div class="card-body">
                        <h5>Total Order(pending)</h5>
                    </div>
                    <div class="card-footer">
                        <p>{{ $total_order }}</p>
                    </div>
                </div>
            </div>
            <!-- cart-3 -->
            <div class="col-xl-4 col-md-6 mt-4">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5>Total Customer</h5>
                    </div>
                    <div class="card-footer">
                        <p>{{ $total_customer }}</p>
                    </div>
                </div>
            </div>
            <!-- row-2 -->
            <div class="col-xl-4 col-md-6 mt-2">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5>Total Revenue</h5>
                    </div>
                    <div class="card-footer">
                        <p>{{ $total_revenue }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mt-2">
                <div class="text-white mb-4" style="background-color: #82589F;">
                    <div class="card-body">
                        <h5>Total</h5>
                    </div>
                    <div class="card-footer">
                        <p>0</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mt-2">
                <div class="card text-white mb-4" style="background-color: #1abc9c;">
                    <div class="card-body">
                        <h5>Total</h5>
                    </div>
                    <div class="card-footer">
                        <p>0</p>
                    </div>
                </div>
            </div>
            <!-- row-3 -->
        </div>
    </div>
</main>
@endsection