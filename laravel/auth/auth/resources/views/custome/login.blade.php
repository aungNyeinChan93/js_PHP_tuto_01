<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>login</h1>
    <form action="{{route("login")}}" method="POST">
        @csrf
        name : <input type="text" name="email" id="">
        @error('email')
            {{$message}}
        @enderror
        password : <input type="password" name="password" id="">
        @error('password')
        {{$message}}
    @enderror
        <input type="submit" value="submit">
    </form>
</body>
</html>
