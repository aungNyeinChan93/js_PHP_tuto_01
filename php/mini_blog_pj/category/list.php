<?php
require_once ("./layout/header.php");
require_once "../db/connection.php";

?>

<?php
// categorylist read and render 
$categoryList_sql = "select * from category order by id desc";
$responce = $pdo->prepare($categoryList_sql);
$responce->execute();
$categoryList = $responce->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-4 mt-4 mx-2">
            <form action="" method="post">
                <input type="text" name="category" placeholder="Enter category name" class="form-control" id="">
                <?php
                if (isset($_POST["category_btn"])) {
                    $categoryStatus_empty = $_POST["category"] == "" ?? false;
                    if ($categoryStatus_empty) {
                        echo "<small class='text-danger'> field name is required!</small>";
                    }
                } ?>
                <div>
                    <input type="submit" name="category_btn" value="Add category" class="btn btn-sm btn-info my-2">
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-lg-6 mt-4">
            <div class="mx-4">
                <?php
                foreach ($categoryList as $value) {
                    $categoryName = $value["name"];
                    $categoryId = $value["id"];
                    echo "
                    <div class='row shadow-sm bg-light p-2 mb-3'>
                       <div class='col-10'>
                            $categoryName
                       </div>
                       <div class='col-2'>
                            <a href='update.php?id=$categoryId'>
                                <span class='text-danger me-2 fs-5'><i class='fa-solid fa-pen-to-square'></i></span>
                            </a>
                            <a href='delete.php?id=$categoryId'>
                                <span class='text-danger me-2 fs-5'><i class='fa-solid fa-trash'></i></span>   
                            </a>
                       </div>
                    </div>"; 
                }   
                ?>
                
            </div>

        </div>
    </div>
</div>


<?php
require_once ("./layout/footer.php");

// category create
if (isset($_POST["category_btn"])) {
    if (!empty($_POST["category"])) {
        $categoryName = $_POST["category"];
        $sql = "insert into category (name) values (?)";
        $res = $pdo->prepare($sql);
        $res->execute([$categoryName]);
        header("Location:./list.php");  
    }
}
?>