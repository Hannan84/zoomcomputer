<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Used Laptop BD </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <!-- font awesome icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>

<body class="sb-nav-fixed">

    @include('admin.partials.header')
    <!-- message -->
    @if(session()->has('message'))
    <p class="alert alert-success">{{ session()->get('message') }}</p>
    @elseif(session()->has('error'))
    <p class="alert alert-danger">{{ session()->get('error') }}</p>
    @endif
    <!-- end -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- forms -->
                        <div class="sb-sidenav-menu-heading">Forms</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                            Add Product
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('admin.manage.category') }}">Category</a>
                                <a class="nav-link" href="{{ route('admin.manage.product') }}">Product</a>
                                <a class="nav-link" href="{{ route('admin.manage.stock') }}">Stock</a>
                                <a class="nav-link" href="{{ route('admin.manage.offer') }}">Offer</a>
                            </nav>
                        </div>
                        <!-- table -->
                        <div class="sb-sidenav-menu-heading">Table</div>
                        <a class="nav-link" href="{{ route('admin.manage.order') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Order
                        </a>
                        <a class="nav-link" href="{{ route('admin.manage.customer') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Customer
                        </a>
                        <a class="nav-link" href="{{ route('admin.view.report') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Report
                        </a>
                        <!-- website footer -->
                        <div class="sb-sidenav-menu-heading">footer</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                            Refund Policy
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Terms and Condition
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    BGD Online Limited
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            @yield('contents')
            @include('admin.partials.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
