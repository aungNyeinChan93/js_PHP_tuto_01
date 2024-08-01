<?php

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Login </title>

<body>
    <h1 class="text-center my-2 h3 text-info fs-1">Login Form</h1>
    <div class="container">
        <div class="row my-5 ">
            <div class="col-6 offset-3 ">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email">
                        <?php
                        if (isset($_POST["login_btn"])) {
                            $email_status = $_POST["email"] == "" ? false : true;
                            echo !$email_status ? "<small class='text-danger'>Need to fill !</small>" : "";
                        }
                        ;
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        <?php
                        if (isset($_POST["login_btn"])) {
                            $password_status = $_POST["password"] == "" ? false : true;
                            echo !$password_status ? "<small class='text-danger'>Need to fill !</small>" : "";
                        }
                        ;
                        ?>
                    </div>
                    <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                </form>
                <button class="btn btn-warning my-2 w-100"><a class="text-decoration-none" href="register.php">Register
                        Here!</a></button>
            </div>
        </div>
    </div>
    <?php
    echo "<pre>";
    if (isset($_POST["login_btn"])) {
        session_start();
        if (!empty(isset($_SESSION["register_data"]))) {
            if($email_status && $password_status){
                print_r($_SESSION["register_data"]);
                if ($_POST["email"] == $_SESSION["register_data"]["email"] && password_verify($_POST["password"], $_SESSION["register_data"]["password"])) {
                    echo "Password Correct!";
                    echo "<span class='h2 text-success'> Login Success!</span>";
                    // header("location:HomePage.php");
                } else {
                    echo "Your Password is incorrect!";
                }
            }
        } else {
            echo "Error => session_data empty!";
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>