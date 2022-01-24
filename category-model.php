<?php

require_once 'logger.php';

function getAllCategories() {
    require 'database.php';
    $result = mysqli_query($conn, "SELECT * FROM `categories`");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getCategory($id) {
    require 'database.php';
    $result = mysqli_query($conn, "SELECT * FROM `categories` WHERE `id` = '$id' LIMIT 1");
    return mysqli_fetch_assoc($result);
}

function createCategory ($name) {
    require "database.php";
    $sql = "INSERT INTO `categories` (`name`) VALUES ('$name')";
    if (mysqli_query($conn, $sql)) {
        return mysqli_insert_id($conn);
    }

    mylog("Error: " . $sql . "<br>" . mysqli_error($conn));

    return 0;
}

function updateCategory($id, $name) {
    require 'database.php';
    return mysqli_query($conn, "UPDATE `categories` SET `name` = '$name' WHERE `categories`.`id` = '$id';");
}

function deleteCategory($id) {
    require 'database.php';
    return mysqli_query($conn, "DELETE FROM `categories` WHERE `categories`.`id` = $id");
}