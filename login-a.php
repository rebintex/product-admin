<?php 



if(($_POST)) {
    require 'database.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");

    if(mysqli_num_rows($query) > 0) {
        header('Location: index2.php');
        echo "Success!";

    }
    else {
        echo "Error while logging in!";
    }


    mysqli_close($conn);

}
?>