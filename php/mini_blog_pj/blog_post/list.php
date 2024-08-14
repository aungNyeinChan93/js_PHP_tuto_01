<?php

require_once "./layout/header.php";
require_once "../db/connection.php";
?>

<?php
//category list read
$sql = "select * from category ";
$res = $pdo->prepare($sql);
$res->execute();
$categoryList = $res->fetchAll(PDO::FETCH_ASSOC);

// 
require_once "./create.php";

require_once "./helper/postsList.php";
// echo "<pre>";    
// print_r($posts_data);
?>



<div class="container">
    <div class="row">
        <div class="col-md-12  col-lg-4">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"
                enctype="multipart/form-data">
                <div>
                    <img src="" class="w-100" id="image" >
                    <input type="file" name="image" class="my-2 form-control" onchange="loadFile(event) ">
                    <?php echo !$imageValidation ? "<small class='text-danger'>Image field is required!</small>" : ""; ?>
                </div>
                <div>
                    <input type="title" name="title" class="form-control" value="<?php echo $_POST["title"] ?? ""; ?>"
                        placeholder="Title">
                    <?php echo !$titleValidation ? "<small class='text-danger'>Title field is required!</small>" : ""; ?>
                </div>
                <div>
                    <textarea name="description" class="form-control my-2" cols="40" rows="10"><?php echo $_POST["description"] ?? "Description"; ?> 
                    </textarea>
                    <?php echo !$descriptionValidation ? "<small class='text-danger'>Description field is required!</small>" : ""; ?>
                </div>
                <div>
                    <select class="form-control" name="category" id="">
                        <option value="">Select Category</option>
                        <?php
                        foreach ($categoryList as $category) {
                            // $name = $category["name"];
                            // $id = $category["id"];
                            echo "
                                <option value='" . $category["id"] . "' " . (isset($_POST["category"]) && $_POST["category"] == $category["id"] ? 'selected' : "") . ">" . $category["name"] . "</option>
                                ";
                        }
                        ?>
                    </select>
                    <?php echo !$categoryValidation ? "<small class='text-danger'>Category field is required!</small>" : ""; ?>
                </div>
                <div>
                    <input type="submit" name="post_btn" value="create" class="btn btn-sm btn-info my-2">
                </div>
            </form>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="row">
                <div class="col">
                    <a href="list.php"><button class="btn btn-sm btn-outline-primary mx-1 my-1">ALL</button></a>
                    <?php
                    foreach($categoryList as $item){
                        echo '
                        <a href="list.php?category_id='.$item['id'].'"><button class="btn btn-sm btn-outline-primary mx-1 my-1">'.$item["name"].'</button></a>
                        ';
                    } 
                    ?>
                </div>
            </div>
            <div class="row ">
                <?php
                foreach ($posts_data as $item) {
                    echo '
                        <div class="col-md-6 col-lg-4" style="height:420px" >
                            <div class="card my-2 rounded-1 shadow-sm" style="width: 15rem;height:400px">
                                <img src="../image/' . $item["image"] . '" class="card-img-top w-100 fill " style="height:250px"">
                                <div class="card-body">
                                    <h6 class="card-title">' . $item["title"] . '</h6>
                                    <small class="card-text">' . mb_strimwidth($item['description'], 0, 50, "...") . '</small>
                                    <h6 class="text-danger my-1">' . $item["name"] . '</h6> 
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col">
                                            <a href="detail.php?id='.$item['post_id'].'" class="me-1"><i class="fa-solid fa-circle-info"></i></a>
                                            <a href="edit.php?id='.$item['post_id'].'&image='.$item['image'].'" class="me-1"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="delete.php?id='.$item["post_id"].'&image='. $item['image'].'" class="me-1 text-danger"><i class="fa-solid fa-delete-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                }
                ?>
            </div>
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