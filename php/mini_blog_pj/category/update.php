<?php
require_once ("./layout/header.php");
require_once "../db/connection.php";
?>

<?php
    // print_r($_REQUEST["id"]);
    $sql ="select * from category where id=?";
    $res = $pdo->prepare($sql);
    $res->execute([$_REQUEST["id"]]);
    $data = $res->fetch(PDO::FETCH_ASSOC);
?>


<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="back">
                <a class="btn btn-sm my-2 btn-success" href="list.php">Back</a>
            </div>
            <form action="updateProcess.php" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id'];?>">   
                <input type="text" name="category" id="" class="form-control mb-3" value="<?php echo $data['name']??"";?>">   
                <input type="submit" name="update_btn" value="update" class="btn btn-sm btn-info">
            </form>
        </div>
    </div>
</div>


<?php
require_once ("./layout/footer.php");
?>