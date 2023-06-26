<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('website/login/form.css') }}">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>User login form</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <!-- Message -->
        @if (session()->has('error'))
            <p class="alert alert-danger">{{ session()->get('error') }}</p>
        @endif
        @if (session()->has('message'))
            <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
        @endif
        <!-- end -->
        <div id="formContent">
            <div class="fadeIn first">
                <br>
                <p>Please! Login from here</p>
            </div>
            <form action="{{ route('user.do.login') }}" method="POST">
                @csrf
                <input type="email" name="email" class="fadeIn second" placeholder="Enter Email" required>
                <input type="password" name="password" class="fadeIn third" placeholder="Enter Password" required>
                <input type="submit" class="fadeIn fourth" value="Sign In">
            </form>
            <div id="formFooter">
                <h4 class="underlineHover mr-2">Forgot password?</h4> <br>
                <strong>if not register</strong>
                <a href="{{ route('user.registration.form') }}" class="btn btn-success text-uppercase">Sign Up</a>
            </div>
        </div>
    </div>
</body>

</html>
