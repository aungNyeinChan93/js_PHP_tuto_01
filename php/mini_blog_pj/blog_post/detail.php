<?php
// echo "<pre>";
// print_r($_REQUEST);
require_once "./layout/header.php";
require_once "../db/connection.php";
?>


<?php

$sql = 'select posts.title ,posts.description ,posts.image ,category.name from posts join category on posts.category_id=category.id where posts.id=?';
$responce = $pdo->prepare($sql);
$responce->execute([$_REQUEST["id"]]);
$detailData = $responce->fetch(PDO::FETCH_ASSOC);
?>
 




<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <img src="../image/<?php echo $detailData["image"]?>" class="w-100 p-2 image-fluid " alt="">
            <div class="title text-muted"><?php echo $detailData["name"] ?> </div>
            <div class="title text-center h2"><?php echo $detailData["title"] ?> </div>
            <!-- <div class="title text-muted"><?php echo $detailData["name"] ?> </div> -->
            <div class="title text-muted"><?php echo $detailData["description"] ?> </div>
            <a href="list.php" class="btn btn-primary my-2">Back</a>

        </div>
    </div>
</div>


<?php
require_once "./layout/footer.php";

?>