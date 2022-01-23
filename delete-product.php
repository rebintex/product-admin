<?php 



function deleteProduct($id) {
    require 'database.php';
    return mysqli_query($conn, "DELETE FROM `products` WHERE `products`.`id` = $id");
}


if ($id = $_REQUEST['id']) {
    
    // if (!getProduct($id)) {
    //     header('Location: '. '/products.php?message=Product does not exists.');
    // }
    $result = deleteProduct($_REQUEST['id']);
    if (!$result) {
        header('Location: '. '/products.php?message=Error while deleting product.');
    }
    header('Location: '. '/products.php?message=Product deleted');
}