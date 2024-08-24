<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="{{url("multiForm")}}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="image[]" multiple><br><br>
            @error("image")
                <small style="color: red;display:block;margin-bottom:10px"> {{$message}}</small>
            @enderror
            <input type="submit"  value="Upload">
        </form>
    </div>
</body>
</html>
