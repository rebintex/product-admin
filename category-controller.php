<?php

require 'category-model.php';

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
    header('Location: add-category.php');
    exit();
}

function store()
{
    if ($data = $_POST) {
        if ($name = $data['name']) {
            if (createCategory($name)) {
                header("location: products.php");
                exit();
            }

            header("Location: add-product.php");
            exit();
        }
        header("Location: add-product.php");
        exit();
    }
}

function edit()
{
    if ($id = $_REQUEST['id']) {
        if ($category = getCategory($id)) {
            require 'edit-category.php';
            exit();
        }
        header('Location: ' . '/products.php?message=Category does not exists.');
        exit();
    }
    header('Location: ' . '/products.php?message=Category id not given');
    exit();
}

function update()
{
    if (($id = $_POST['id']) && ($name = $_POST['name'])) {
        if (!getCategory($id)) {
            header('Location: ' . '/products.php?message=Category does not exists.');
            exit();
        }
        $result = updateCategory($id, $name);
        if (!$result) {
            header('Location: ' . '/products.php?message=Error while deleting category.');
            exit();
        }
        header('Location: ' . '/products.php?message=Category deleted');
        exit();
    }
    header('Location: ' . '/products.php?message=Category id not given');
    exit();
}

function delete()
{
    if ($id = $_REQUEST['id']) {
        if (!getCategory($id)) {
            header('Location: ' . '/products.php?message=Category does not exists.');
            exit();
        }
        $result = deleteCategory($id);
        if (!$result) {
            header('Location: ' . '/products.php?message=Error while deleting category.');
            exit();
        }
        header('Location: ' . '/products.php?message=Category deleted');
        exit();
    }
    header('Location: ' . '/products.php?message=Category id not given');
    exit();
}