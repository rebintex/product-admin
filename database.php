<?php

$conn = mysqli_connect("localhost", "root", "", "product_admin");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

