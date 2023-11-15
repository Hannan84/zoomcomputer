<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('admin/css/login.css') }}">
    <title>Reset</title>
</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">change password</h3>
        <!-- message -->
        @if(session()->has('message'))
        <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
        @elseif(session()->has('error'))
        <p class="alert alert-danger text-center">{{ session()->get('error') }}</p>
        @endif
        <!-- end -->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form action="{{ route('user.update-password') }}" id="login-form" class="form" method="POST">
                            @csrf
                            <h3 class="text-center text-info">Reset</h3>
                            <div class="form-group">
                                <label for="password" class="text-info">New Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm password" class="text-info">Confirm Password:</label><br>
                                <input type="password" name="con_password" id="con_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <Button type="submit" class="btn btn-info w-100">Submit</Button>
                                <a href="{{ url()->previous() }}" class="btn btn-info w-100 mt-1">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>