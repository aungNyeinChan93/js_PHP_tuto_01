<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Admin Page</h1>
    <small style="color: rebeccapurple"> {{Auth::user()}}</small>

    @session('Not_Auth')
       <p> {{session("Not_Auth")}}</p>
    @endsession
    <form action="{{route("logout")}}" method="POST">
        @csrf
        <button>Logout</button>
        <br><br>
        {{Auth::user()}}
    </form>
</body>
</html>
