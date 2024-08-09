<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
</head>

<body>
    <?php
    echo "<pre>";
    include_once "./database.php";
    ?>
    <h1>Create Form</h1>
    <form action="" method="post">
        Name : <input type="text" name="name" value="<?php echo $_POST["name"]??"" ?>"> <br>
        Email : <input type="text" name="email" value="<?php echo $_POST["email"]??"" ?>"> <br>
        Address : <input type="text" name="address" value="<?php echo $_POST["address"]??"" ?>"> <br>
        <input type="submit" value="Add" name="add_btn">
    </form>
    <?php
    // if($_SERVER["REQUEST_METHOD"] == "POST"){};
    if (isset($_POST["add_btn"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        if (!empty($name || $email || $address)) {
            $sql = "insert into users (name,email,address) values (?,?,?)";
            $res = $pdo->prepare($sql);
            $res->execute([$name, $email, $address]);
            echo "<h2>Create success!</h2>";
        } else {
            echo "field is required";
        }
    }
    ?>
</body>

</html>