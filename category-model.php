<?php

function getAllCategories() {
    require 'database.php';
    $result = mysqli_query($conn, "SELECT * FROM `categories`");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}