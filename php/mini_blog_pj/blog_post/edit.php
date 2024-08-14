<?php

require_once "./layout/header.php";
require_once "../db/connection.php";

require_once './editProcess.php';
?>
<?php
// read category 
$sql = "select * from category ";
$res= $pdo->prepare($sql);
$res->execute([]);
$categoryList = $res->fetchAll(PDO::FETCH_ASSOC);

// read old_data
$old_spl = "select * from posts where id=?";
$old_res = $pdo->prepare($old_spl);
$old_res->execute([$_REQUEST["id"]]);
$old_data = $old_res->fetch(PDO::FETCH_ASSOC);

// print_r($old_data);
require_once './editProcess.php';
?>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="w-100 p-2 ">
                    <img src="../image/<?php echo $old_data["image"]?>" class="w-75 mx-auto d-block" id="image">
                </div>
                <input type="hidden" name="hidden" value="<?php echo $old_data["id"]?>">
                <input type="hidden" name="hide_image" value="<?php echo $old_data["image"]?>">
                <input type="file" name="image" class="my-2 form-control my-2" onchange="loadFile(event)">
                <input type="text" name="title" placeholder="Title" class="form-control  my-2" value="<?php echo $_POST["title"]?? $old_data["title"];?>">
                <?php
                   echo  $titleStatus_empty? "<small class='text-danger'>Title field is required!</small>":"";
                ?>
                <textarea name="description" placeholder="" class="form-control" rows="10" cols="40" >
                    <?php echo $_POST["description"]?? $old_data["description"]?>
                </textarea>
                <?php
                   echo  $description_empty? "<small class='text-danger'>Description field is required!</small>":"";
                ?>
                <select name="category" class="form-control my-2" >
                    <?php
                        foreach($categoryList as $item){
                            // if($item["id"]== $old_data["id"]){

                            // }
                            echo '
                                <option value="'.$item["id"].'">'.$item["name"].'</option>
                            ';
                        }
                    ?>
                </select>
                <input class="btn btn-success" type="submit" value="edit" name="edit_btn">
                <a class="btn btn-success" href='list.php'>Back</a>
            </form> 
        </div>
    </div>
</div>


<?php
require_once "./layout/footer.php";

?>

<script>
    // image preview
    function loadFile(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var image = document.getElementById("image");
            image.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

</script>