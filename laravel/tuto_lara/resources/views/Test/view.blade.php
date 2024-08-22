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
    <div class="container w-100 my-3">
        <div class="card">
            <div class="card-header">
                {{ $data['title'] }}
            </div>
            <div class="card-body ">
                <h5 class="card-title">{{ $data['title'] }}</h5>
                <p class="card-text">{{ $data['description'] }}</p>
                <a href="{{ url('/make') }}" class="btn btn-success">Back</a>
            </div>
        </div>
    </div>
</body>

</html>
