<?php

require '../models/category-model.php';

switch ($_REQUEST['method']) {
    case 'create':
        create();
        break;
    case 'store':
        store();
        break;
    case 'edit':
        edit();
        break;
    case 'update':
        update();
        break;
    case 'delete':
        delete();
        break;
}

function create()
{
    header('Location: ../views/add-category.php');
    exit();
}

function store()
{
    if ($data = $_POST) {
        if ($name = $data['name']) {
            if (createCategory($name)) {
                header("location: ../views/products.php");
                exit();
            }

            header("Location: ../views/add-product.php");
            exit();
        }
        header("Location: ../views/add-product.php");
        exit();
    }
}

function edit()
{
    if ($id = $_REQUEST['id']) {
        if ($category = getCategory($id)) {
            require '../views/edit-category.php';
            exit();
        }
        header('Location: ' . '../views/products.php?message=Category does not exists.');
        exit();
    }
    header('Location: ' . '../views/products.php?message=Category id not given');
    exit();
}

function update()
{
    if (($id = $_POST['id']) && ($name = $_POST['name'])) {
        if (!getCategory($id)) {
            header('Location: ' . '../views/products.php?message=Category does not exists.');
            exit();
        }
        $result = updateCategory($id, $name);
        if (!$result) {
            header('Location: ' . '../views/products.php?message=Error while deleting category.');
            exit();
        }
        header('Location: ' . '../views/products.php?message=Category deleted');
        exit();
    }
    header('Location: ' . '../views/products.php?message=Category id not given');
    exit();
}

function delete()
{
    if ($id = $_REQUEST['id']) {
        if (!getCategory($id)) {
            header('Location: ' . '../views/products.php?message=Category does not exists.');
            exit();
        }
        $result = deleteCategory($id);
        if (!$result) {
            header('Location: ' . '../views/products.php?message=Error while deleting category.');
            exit();
        }
        header('Location: ' . '../views/products.php?message=Category deleted');
        exit();
    }
    header('Location: ' . '../views/products.php?message=Category id not given');
    exit();
}