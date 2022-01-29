<?php

// include 'logger.php';


function getAllProducts() {
    require 'database.php';
    $result = mysqli_query($conn, "SELECT products.id, products.name, products.price, categories.name as category 
    FROM `products` JOIN `categories` ON `products`.`category_id` = `categories`.`id`");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getProduct($id) {
    require 'database.php';
    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` = '$id' LIMIT 1");
    return mysqli_fetch_assoc($result);
}


function createProduct($name, $price, $category_id) {
    require "database.php";
    $sql = "INSERT INTO `products` (`name`, `price`, `category_id`) VALUES ('$name', '$price', '$category_id')";
    return  mysqli_query($conn, $sql);

}

function deleteProduct($id) {
    require 'database.php';
    return mysqli_query($conn, "DELETE FROM `products` WHERE `products`.`id` = '$id'");
}

function updateProduct($name, $price, $category_id, $id) {
    require 'database.php';
    return mysqli_query($conn, "UPDATE `products` SET 
    `name`='$name', `price`='$price', `category_id`='$category_id' WHERE `products`.`id` = '$id'");
    
}