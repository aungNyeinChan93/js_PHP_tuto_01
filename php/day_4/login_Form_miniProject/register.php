<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Register </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body style="position:relative">
    <h1 class="text-center my-2 h3 text-info fs-1">Register Form</h1>
    <div class="container">
        <div class="row my-5 ">
            <div class="col-6 offset-3 ">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="userName">
                        <?php
                        if (isset($_POST["register_btn"])) {
                            $userName_status = $_POST["userName"] == "" ? false : true;
                            echo !$userName_status ? "<small class='text-danger fw-light'>Name field is required!</small>" : "";
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="eamil" class="form-control" name="userEmail">
                        <?php
                        if (isset($_POST["register_btn"])) {
                            $userEmail_status = $_POST["userEmail"] == "" ? false : true;
                            echo !$userEmail_status ? "<small class='text-danger fw-light'>Email field is required!</small>" : "";
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="userPassword">
                        <?php
                        if (isset($_POST["register_btn"])) {
                            $userPassword_status = $_POST["userPassword"] == "" ? false : true;
                            echo !$userPassword_status ? "<small class='text-danger fw-light'>Password field is required!</small>" : "";
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="userPaasword_confirm">
                        <?php
                        if (isset($_POST["register_btn"])) {
                            $userPasswordConfirm_status = $_POST["userPaasword_confirm"] == "" ? false : true;
                            echo !$userPasswordConfirm_status ? "<small class='text-danger fw-light'>Password field is required!</small>" : "";
                        }
                        ?>
                    </div>
                    <button name="register_btn" type="submit" class="btn btn-primary my-2">Register</button>
                </form>
                <button class="btn btn-warning"><a class="text-decoration-none" href="login.php">Login
                        Here!</a></button>
            </div>
        </div>
    </div>

    <?php
    require_once "./registerProcess.php";
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</html>