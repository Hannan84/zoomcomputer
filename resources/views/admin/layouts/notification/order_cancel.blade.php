<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Order cancel notification</title>
</head>
<body>
    <section>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="bg-danger p-2 mt-2 text-white text-center">
                        Your Order Canceled
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col border m-2 p-4 text-secondary font-italic rounded">
                    <h5>
                        Model:{{ $model }}
                    </h5>
                    <h5>
                        Product name: {{ $pName }}
                    </h5>
                    <h5>
                        Price: {{ $price}}
                    </h5>
                    <h5>
                        Quantity: {{ $quantity }}
                    </h5>
                </div>
            </div>
        </div>
    </section>
</body>
</html>