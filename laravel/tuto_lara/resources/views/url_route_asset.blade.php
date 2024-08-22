<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- asset to point >>public folder! --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
</head>

<body>
    <div>

        {{-- url point >> routes/web/uri --}}
        {{ url('anc/test_1') }}
        <hr>
        {{-- route point >> routes/web/routeName --}}
        {{ route('test1') }}

        <hr>
        {{-- asset to point >> public folder! --}}
        {{asset("")}}
        <br>
        <img src="{{asset("image/unnamed.jpg")}}" alt="img" width="200px">

    </div>
</body>
<script src="{{asset("js/app.js")}}"></script>

</html>


