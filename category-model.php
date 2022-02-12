<?php

require_once 'logger.php';

function getAllCategories() {
    require 'database.php';
//     $result = mysqli_query($conn, "SELECT * FROM `categories`");
//     return mysqli_fetch_all($result, MYSQLI_ASSOC);
    $statement = $conn->prepare("SELECT * FROM `categories`");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);

}

function getCategory($id) {
    require 'database.php';
    // $result = mysqli_query($conn, "SELECT * FROM `categories` WHERE `id` = '$id' LIMIT 1");
    // return mysqli_fetch_assoc($result);
    $statement = $conn->prepare("SELECT * FROM categories WHERE id = :id LIMIT 1");
    $statement->execute(['id' => $id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function createCategory ($name) {
    require "database.php";
    $sql = "INSERT INTO `categories` (name) VALUES (:name)";
    $statement = $conn->prepare($sql);
    $statement->execute(['name' => $name]);
    return $conn->lastInsertId(); 
    // if (mysqli_query($conn, $sql)) {
    //     return mysqli_insert_id($conn);
    // }
    // mylog("Error: " . $sql . "<br>" . mysqli_error($conn));
    // return 0;
}

function updateCategory($id, $name) {
    require 'database.php';
    //return mysqli_query($conn, "UPDATE `categories` SET `name` = '$name' WHERE `categories`.`id` = '$id';");
    $statement = $conn->prepare("UPDATE `categories` SET name = :name WHERE categories.id = :id;");
    return $statement->execute([':name' => $name, ':id' => $id]); 
}

function deleteCategory($id) {
    require 'database.php';
    // return mysqli_query($conn, "DELETE FROM `categories` WHERE `categories`.`id` = $id");
    $statement = $conn->prepare("DELETE FROM `categories` WHERE categories.id = :id");
    return $statement->execute(['id' => $id]); 
}