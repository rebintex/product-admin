<?php

// include 'logger.php';


function getAllProducts() {
    require '../config/database.php';
    // $result = mysqli_query($conn, "SELECT products.id, products.name, products.price, categories.name as category 
    // FROM `products` JOIN `categories` ON `products`.`category_id` = `categories`.`id`");
    // return mysqli_fetch_all($result, MYSQLI_ASSOC);
    $statement = $conn->prepare("SELECT products.id, products.name, products.price, products.images, categories.name as category 
    FROM `products` JOIN `categories` ON `products`.`category_id` = `categories`.`id`");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getProduct($id) {
    require '../config/database.php';
    // $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` = '$id' LIMIT 1");
    // return mysqli_fetch_assoc($result);
    $statement = $conn->prepare("SELECT * FROM products WHERE id = :id LIMIT 1");
    $statement->execute(['id' => $id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}


function createProduct($name, $price, $category_id, $image) {
    require "../config/database.php";
    // $sql = "INSERT INTO `products` (`name`, `price`, `category_id`) VALUES ('$name', '$price', '$category_id')";
    // return  mysqli_query($conn, $sql);
    $sql = "INSERT INTO `products` (name, price, category_id, images) VALUES (:name, :price, :category_id, :image)";
    $statement = $conn->prepare($sql);
    $statement->execute(['name' => $name, 'price' => $price, 'category_id' => $category_id, 'image' => $image]);
    return $conn->lastInsertId(); 

}

function deleteProduct($id) {
    require '../config/database.php';
    //return mysqli_query($conn, "DELETE FROM `products` WHERE `products`.`id` = '$id'");
    $statement = $conn->prepare("DELETE FROM `products` WHERE products.id = :id");
    return $statement->execute(['id' => $id]); 
}

function updateProduct($name, $price, $category_id, $id, $image) {
    require '../config/database.php';
    // return mysqli_query($conn, "UPDATE `products` SET 
    // `name`='$name', `price`='$price', `category_id`='$category_id' WHERE `products`.`id` = '$id'");
    $statement = $conn->prepare("UPDATE `products` SET name = :name, price = :price, images = :image, category_id = :category_id 
    WHERE products.id = :id;");
    return $statement->execute(['name' => $name, 'price' => $price,'image'=> $image,
                               'category_id' => $category_id, 'id' => $id,]);
    
}