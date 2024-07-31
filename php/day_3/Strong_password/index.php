<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Checker</title>
</head>

<body>
    <h1>Strong Password Checker</h1>
    <hr>
    <form action="" method="post">
        <input type="text" name="text" value="">
        <br><br>
        <input type="submit" value="Check" name="check_btn">
        <br>
    </form>
    <?php
    echo "<pre>";
    if (isset($_POST["check_btn"])) {
        $userText = $_POST["text"];
        $textLength = strlen($userText);
        $capatalize = preg_match("/[A-Z]/", $userText) ?? false;
        $small_leter = preg_match("/[a-z]/", $userText) ?? false;
        $special_char = preg_match("/[!@#$%^&*]/", $userText) ?? false;
        $digit_number = preg_match("/[0-9]/", $userText) ?? false;
        if ($textLength >= 5 && $textLength <= 20) {
            if ($capatalize && $small_leter && $special_char && $digit_number) {
                echo "<h3 style='color:green;'>Your Password is Strong!</h3>" . $userText;
            } else {
                echo "<h3 style='color:red;'>Your Password is Weak!</h3>" . $userText;
            }
        }else{
            echo "<h1 style='color:red'>Something Wrong!</h1>";
        }
    }
    ;
    ?>
</body>

</html>

<script>
    /* 
        
    */
</script>