<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Product</title>
</head>

<body>
    <div class="container w-100">
        <div class="card mx-auto my-3 " style="width: 40rem;">
            <div class="card-header">
                Products
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($filter as $key => $item)
                    <a class=" link-style-none" href="{{url('/products/'.$item["id"].'')}}">
                        <li class="list-group-item w-100" >{{$item["title"]}}</li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
