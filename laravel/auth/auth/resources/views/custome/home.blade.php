<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Home Page</h1>
    @session('Not_Auth')
       <p> {{session("Not_Auth")}}</p>
    @endsession
    <small style="color: rebeccapurple"> {{Auth::user()}}</small>
    <form action="{{route("logout")}}" method="POST">
        @csrf
        <button>Logout</button>
        <br><br>
        {{Auth::user()}}



    </form>
</body>
</html>
