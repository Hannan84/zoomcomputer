<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('website/css/profile.css') }}">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>user profile</title>
</head>

<body class="">
    <section class="user-profile">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- profile header --}}
                    <div class="profile-header">
                        <i class="fa fa-user-circle" style="font-size:2.8rem;"></i>
                        <h2 class="text-capitalize"> &nbsp; hello, {{ $user->name }}</h2>
                    </div>
                    {{-- settings --}}
                    <div class="profile-settings">
                        <div class="dropdown">
                            <button type="button" class="btn btn-light border" data-toggle="dropdown">
                                <i class="fa fa-cog" aria-hidden="true"> Settings</i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('user.edit.profile', $user->id) }}"
                                    class="btn btn-secondary">
                                    <i class="fa fa-pencil"> edit</i>
                                </a>
                                <a class="dropdown-item" href="{{ route('user.logout') }}" class="btn btn-danger ml-2">
                                    <i class="fa fa-sign-out" aria-hidden="true"> logout</i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Message -->
                    @if (session()->has('error'))
                        <p class="alert alert-danger text-center">{{ session()->get('error') }}</p>
                    @endif
                    @if (session()->has('message'))
                        <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
                    @endif
                    <!-- end -->
                </div>
            </div>
        </div>
        {{-- card --}}
        <div class="profile-card">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 mt-2">
                        <div class="profile_card">
                            <a href="{{ route('user.view.order.list',$user->id) }}">
                                <div class="profile_card_img">
                                    <i class="fa fa-first-order" aria-hidden="true"></i>
                                </div>
                                <div class="profile_card_details">
                                    <p>OrderList</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-2">
                        <div class="profile_card">
                            <a href="{{ route('user.view.my.cart') }}">
                                <div class="profile_card_img">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </div>
                                <div class="profile_card_details">
                                    <p>My Card</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-2">
                        <div class="profile_card">
                            <a href="#">
                                <div class="profile_card_img">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                </div>
                                <div class="profile_card_details">
                                    <p>Forget Password</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
