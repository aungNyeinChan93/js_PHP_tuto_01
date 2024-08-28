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


    <div class="container">
        <div class="row">
            <div class="col-6-offset-3">
                <form action="{{ url("product") }}" method="POST">
                    @csrf
                    <input type="text" name="name"  placeholder="Enter name" class="form-control my-2" value="{{old("name")}}"     >
                    <input type="text" name="price" placeholder="Enter price"  class="form-control my-2" value="{{old("price")}}">
                    <input type="submit" class="btn btn-sm btn-success"  value="Confrim">
                </form>
            </div>
        </div>
    </div>


</body>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
