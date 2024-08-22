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

<body class="">
    <div class="container mx-2">
        <div class="conatiner">
            <form action="{{ url('/make') }}" method="POST">
                @csrf
                <input placeholder="title" type="text" name="title" class="form-control my-2">
                <textarea placeholder="description" class="form-control my-2" name="description" cols="30" rows="10"></textarea>
                <input type="submit" class="btn btn-sm btn-info" value="send">
            </form>
        </div>

    </div>
</body>

</html>
