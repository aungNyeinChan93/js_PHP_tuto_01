<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>show</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card my-5">
                    <h5 class="card-header">{{$product->id}}</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text text-danger">PRICE :: {{$product->price}}</p>
                        <a href="{{ url("product") }}" class="btn btn-sm btn-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
