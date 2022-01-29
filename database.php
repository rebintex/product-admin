<?php

$conn = mysqli_connect("localhost", "root", "root", "product-admin");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

