<?php

$conn = new mysqli("localhost", "root", "", "product_admin");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

return $conn;
