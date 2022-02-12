<?php 



if(($_POST)) {
    require 'database.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = $conn->prepare("SELECT * FROM `users` WHERE username = :username AND password = :password");
    $statement->execute(['username' => $username, 'password' => $password]);
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    if($data > 0) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: products.php');
        echo "Success!";

    }
    else {
        echo "Error while logging in!";
    }


    $conn = null;

}
?>