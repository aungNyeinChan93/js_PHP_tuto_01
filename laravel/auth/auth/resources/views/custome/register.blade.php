<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
    <h1>register</h1>
    <form action="{{route("register")}}" method="post">
        @csrf

        name: <input type="text" name="name" id="">
        @error('name')
            {{$message}}
        @enderror
        <br>

        email: <input type="text" name="email" id="">
        @error('email')
            {{$message}}
        @enderror
        <br>

        password: <input type="text" name="password" id="">
        @error('password')
            {{$message}}
        @enderror
        <br>

        Confirm password: <input type="text" name="password_confirmation" id="">
        @error('password_confirmation')
            {{$message}}
        @enderror
        <br>

        <input type="submit" value="submit">

    </form>
</body>
</html>
