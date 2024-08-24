<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container-sm my-4">
        <form action="{{ url('fileupload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <img src="" alt="image" width="300px" id="image" class="mx-auto img-thumbnail d-block text-center p-2 my-2">
            <input type="file" name="image" id="image" class="form-control my-1" onchange="loadFile(event)">
            @error('image')
                <small class="alert alert-danger d-block">{{$message}}</small>
            @enderror
            <input class="btn btn-info" type="submit" value="Upload">
        </form>
    </div>
</body>

<script>
    function loadFile(event) {
        var reader = new FileReader();
        reader.onload = function() {
            let image = document.getElementById("image");
            image.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
{{-- <script src="asset{{"js/app.js"}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
