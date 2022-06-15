<?php 
require '../models/product-model.php';

switch ($_REQUEST['method']) {
    case 'create':
        createP();
        break;
    case 'store':
        storeP();
        break;
    case 'edit':
        editP();
        break;
    case 'update':
        updateP();
        break;
    case 'delete':
        deleteP();
        break;
}

function createP() {
    header('Location: ../views/add-product.php');
    exit();

}


function storeP() {
    if($data = $_POST) {
        $name = $data['name'];
        $price = $data['price'];
        $category_id = $data['category_id'];
        
        if(createProduct($name, $price, $category_id)) {
                header("location: ../views/products.php");
                exit();
        } else {
            header("location: ../views/products.php?message=Product is not added!");
                // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } 
    }

function deleteP() {
    if ($id = $_REQUEST['id']) {
        $result = deleteProduct($id);
        if (!$result) {
            header('Location: '. '../views/products.php?message=Error while deleting product.');
            exit();
        }
        header('Location: '. '../views/products.php?message=Product deleted');
        exit();
    }
}

function editP() {
    if($id = $_REQUEST['id']) {
        if($product = getProduct($id)) {
            require '../views/edit-product.php';
            exit();
        }
    // header('Location: edit-product.php');
    // exit();
    }
}

function updateP() {
    if (($id = $_POST['id']) && ($name = $_POST['name']) && ($price = $_POST['price']) && ($category_id = $_POST['category_id'])) {
        if (!getProduct($id)) {
            header('Location: ' . '../views/products.php?message=Product does not exist.');
            exit();
        }
        $result = updateProduct($name, $price, $category_id, $id);
        if (!$result) {
            header('Location: ' . '../views/products.php?message=Error while updating product.');
            exit();
        }
        header('Location: ' . '../views/products.php?message=Product is updated');
        exit();
    }
    header('Location: ' . '../views/products.php?message=Product id is not given');
    exit();
}