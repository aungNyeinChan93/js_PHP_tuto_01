<?php

// require_once "../../db/connection.php";
if (isset($_GET["category_id"])) {
    $sql = "select posts.id as post_id ,posts.title,posts.description ,posts.category_id ,posts.image,category.name from 
    posts left join category on posts.category_id = category.id where posts.category_id=? order by posts.created_at desc";
    $responce = $pdo->prepare($sql);
    $responce->execute([$_GET["category_id"]]);
    $posts_data = $responce->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql = "select posts.id as post_id ,posts.title,posts.description ,posts.category_id ,posts.image,category.name from 
    posts left join category on posts.category_id = category.id order by posts.created_at desc";
    $responce = $pdo->prepare($sql);
    $responce->execute();
    $posts_data = $responce->fetchAll(PDO::FETCH_ASSOC);
}



