<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   @foreach ($cars as $car)
    <form  action="{{url("cars/post/$car->id")}}" method='post'>
        @csrf
        <button type='submit'>POST</button>
    </form>
   @endforeach
</body>
</html>
