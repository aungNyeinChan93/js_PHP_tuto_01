<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get||Post Methods</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<div class="container my-5 mx-auto  p-2 rounded">
    <form action="test.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input name="check" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <div class="mb-3 form-check">
            <select name="gender" id="" class="form-control w-25  text-center">
                <option value="unknown">gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="multi_Check d-flex ">
            <div class="mb-3 ms-2 form-check">
                english
                <input name="skill[]" value="eng" type="checkbox" class="form-check-input" id="">
            </div>
            <div class="mb-3 ms-2 form-check">
                myanmar
                <input name="skill[]" value="mm" type="checkbox" class="form-check-input" id="">
            </div>
        </div>
        <div class="multi_radio d-flex">
            <div class="mb-3 ms-2 form-check ">
                <input name="status" value="single" type="radio" class="form-check-input" id="radio">
                <label class="form-check-label" for="radio">single</label>
            </div>
            <div class="mb-3 ms-2 form-check">
                <input name="status" value="married" type="radio" class="form-check-input" id="radio1">
                <label class="form-check-label" for="radio1">married</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" name="file" type="file" id="formFile">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
echo "<pre>";
var_dump($_POST);

if (!empty(isset($_POST["email"])) && !empty(isset($_POST["password"]))) {
    print_r($_REQUEST);
    print_r($_POST["password"]);
    print_r($_FILES);

} else {
    echo "<h1>PLZ Input information fill!</h1>";
}
//get method => http://localhost:8000/index.php?email=asdas%40safdsd&password=123213&check=on
?>
<form action="" enctype="multipart/form-data"></form>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>

</html>