<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>edit</title>
</head>
<body>


    <div class="container">
        <div class="row">
            <div class="col-6-offset-3">
                <form action="{{ url("product/$product->id") }}" method="POST">
                    @csrf
                    @method("PUT")
                    <input type="text" name="name" class="form-control my-2" value="{{old("name") ?? $product->name}}">
                    <input type="text" name="price" class="form-control my-2" value="{{old("price") ??$product->price }}">
                    <input type="submit" class="btn btn-sm btn-primary" value="Confrim">
                </form>
            </div>
        </div>
    </div>


</body>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
