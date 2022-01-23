<?php 



function deleteCategory($id) {
    require 'database.php';
    return mysqli_query($conn, "DELETE FROM `categories` WHERE `categories`.`id` = $id");
}


if ($id = $_REQUEST['id']) {
    
    // if (!getProduct($id)) {
    //     header('Location: '. '/products.php?message=Product does not exists.');
    // }
    $result = deleteCategory($_REQUEST['id']);
    if (!$result) {
        header('Location: '. '/products.php?message=Error while deleting category.');
    }
    header('Location: '. '/products.php?message=Category deleted');
}