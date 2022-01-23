<?php

require "database.php";
if($data = $_POST) {
    $name = $data['name'];
    $price = $data['price'];
    $category_id = $data['category_id'];
    
    if($name && $price && $category_id) {
        $sql = "INSERT INTO `products` (`name`, `price`, `category_id`) VALUES ('$name', '$price', '$category_id')";
        if (mysqli_query($conn, $sql)) {
            header("location: products.php");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    } 
}


mysqli_close($conn);