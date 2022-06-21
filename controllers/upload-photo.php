<?php
//
//if(isset($_FILES)) {
//    $image = $_FILES['image']['name'];
////    $name = substr(md5(rand(0, 99)), 0, 7);
//    $tmp_name = $_FILES['image']['tmp_name'];
//  if(move_uploaded_file($tmp_name, '../public/uploads/' . $image)) {
//      //echo "Photo has been loaded";
//
//      require '../config/database.php';
//
//      $sql = "INSERT INTO `products` (images) VALUES (:image)";
//      $statement = $conn->prepare($sql);
//      $statement->execute(['image' => $image]);
//      //return $conn->lastInsertId();
//
//  } else {
//      echo "FAIL";
//  };
//
//    header('Location: ../../views/add-product.php');
//    //var_dump($image  ." - ". $tmp_name);
//
//}

