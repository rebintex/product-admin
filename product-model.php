<?php

function getAllProducts() {
    require 'database.php';
    $result = mysqli_query($conn, "SELECT products.id, products.name, products.price, categories.name as category 
    FROM `products` JOIN `categories` ON `products`.`category_id` = `categories`.`id`");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}