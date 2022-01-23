<?php  

require "database.php";
if($data = $_POST) {
    if($name = $data['name']) {
        $sql = "INSERT INTO `categories` (`name`) VALUES ('$name')";
        if (mysqli_query($conn, $sql)) {
            header("location: products.php");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    } 
}


mysqli_close($conn);




