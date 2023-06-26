<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>User Registration Form</title>
</head>

<body>
    <div class="registration_form m-4">
        <div class="form-header m-4 text-center text-uppercase">
            <h1>Fill the form to register</h1>
        </div>
        <!-- Validation Error Message -->
        <div class="message">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('message'))
                <p class="alert alert-danger">
                    {{ session()->get('message') }}
                </p>
            @endif
        </div>
        <!-- error message -->
        <form action="{{ route('user.do.registration') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name1">Name</label>
                <input type="text" name="name" class="form-control" id="name1"
                    placeholder="Enter Your Full Name" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4"
                        placeholder="Password" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="inputPassword4"
                        placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St"
                    required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputphone">Phone</label>
                    <input type="number" name="phone" class="form-control" id="inputphone" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-info w-100 text-uppercase">Sign in</button>
        </form>
    </div>
</body>

</html>
