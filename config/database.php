<?php

$username = "root";
$password = "";

try {
$conn = new PDO("mysql:host=localhost;dbname=product-admin", $username, $password);
} 
catch (PDOException $e) {
  echo "Error! - " . $e->getMessage();
  die();
}
return $conn;


