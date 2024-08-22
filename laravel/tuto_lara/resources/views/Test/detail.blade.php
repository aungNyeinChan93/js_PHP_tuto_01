<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container w-100 ">
        @foreach ($res as $item)
            <div class="card mx-auto my-4">
                <div class="card-header">
                    {{ $item['title'] }}
                </div>
                <div class="card-body ">
                    <div class="w-100 ">
                        <img src="{{ $item['image'] }}" width="300px"
                            class=" d-block img-thumbnail my-4 p-3 shadow rounded-3 mx-auto">
                    </div>
                    <h5 class="card-title">{{ $item['title'] }}</h5>
                    <p class="card-text">{{ $item['description'] }}</p>
                    <a href="{{ url('/products') }}" class="btn btn-success">Back</a>
                </div>
            </div>
        @endforeach

    </div>
</body>

</html>
