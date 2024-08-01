<?php

echo "<pre>";
function strongPassWordChecker($password)
{
    $userPassword = $password;
    $capatalize = preg_match("/[A-Z]/", $userPassword) ?? false;
    $small_leter = preg_match("/[a-z]/", $userPassword) ?? false;
    $special_char = preg_match("/[!@#$%^&*]/", $userPassword) ?? false;
    $digit_number = preg_match("/[0-9]/", $userPassword) ?? false;
    if ($capatalize && $small_leter && $special_char && $digit_number) {
        // echo "<h3 style='color:green;'>Your Password is Strong!</h3>" . $userPassword;
        return true;
    } else {
        // echo "<h3 style='color:red;'>Your Password is Weak!</h3>" . $userPassword;
        return false;

    }
}

if (isset($_POST["register_btn"])) {
    // var_dump($_POST);
    if ($userName_status && $userPassword_status && $userEmail_status && $userPasswordConfirm_status) {
        echo "pass<br>";
        if ($_POST["userPassword"] == $_POST["userPaasword_confirm"]) {
            if (strlen($_POST["userPassword"]) >= 5 && strlen($_POST["userPassword"]) <= 20) {
                strongPassWordChecker($_POST["userPassword"]);
                if (strongPassWordChecker($_POST["userPassword"])) {
                    echo "<h3 style='color:green;'>Your Password is Strong!</h3>";
                    session_start();
                    $register_data = [
                        "userName" => $_POST["userName"],
                        "email" => $_POST["userEmail"],
                        "password" => password_hash($_POST["userPassword"], PASSWORD_BCRYPT),
                    ];
                    $_SESSION["register_data"] = $register_data;
                    print_r($_SESSION["register_data"]);
                    echo "
                    <div class='position-absolute top-0 w-100 p-2'>
                        <div class=' top-0 alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong class='h5 text-center'>Register Success!</strong> 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                    ";
                    // header("location:login.php");

                } else {
                    echo "<h3 style='color:red;'>Your Password is Weak!</h3>";
                }
            } else {
                echo "password length must be between 5~20 <br>";
            }
        } else {
            echo " password must be same password<br>";
        }
    } else {
        echo "error<br>";
    }
}


