<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <a href="{{ url('product/create') }}" class="btn btn-success my-3">Create </a>
                @if(session("create"))
                    <div class="alert alert-success">{{session("create")}} </div>
                @endif
                @if(session("update"))
                    <div class="alert alert-success">{{session("update")}} </div>
                @endif
                @if(session("delete"))
                    <div class="alert alert-success">{{session("delete")}} </div>
                @endif
                @foreach ($products as $product)
                    <div class="card my-2">
                        <h5 class="card-header">{{ $product->id }}</h5>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-danger">PRICE :: {{ $product->price }}</p>
                            <a href="{{ url("product/{$product->id}") }}" class="btn btn-sm btn-info">Go Detail</a>
                            <a href="{{ url("product/{$product->id}/edit") }}" class="btn btn-sm btn-warning">Edit</a>

                            <form method="POST" class=" d-inline" action=" {{ url("product/{$product->id}") }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
