<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <br>
    <form action="{{ url('/form') }}" method="post">
    @csrf
        <input type="number" name="number" id=""><br><br>
        <input type="number" name="number2" id=""><br><br>
        <input type="submit" value="send">
    </form>
</body>

</html>
