<?php
session_start();  
require '../models/category-model.php';
require '../models/product-model.php';


// require 'product-controller.php';


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Admin HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../public/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../public/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="../public/index.php">
          <h1 class="tm-site-title mb-0">Product Admin</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>
          <h2><?php
//              if(!empty($_FILES)){
//                  var_dump($_FILES['image']);
//              } else {
//                  echo "Photo is not found";
//              }
               ?></h2>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            <li class="nav-item">
              <a class="nav-link active" href="products.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="accounts.php">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link d-block" href="accounts.php?id=<?= $users['id']; ?>">
                 User: 
                <b> <?php echo $_SESSION['username']; ?></b>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-block" href="../public/index.php">
                <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <?php echo $_REQUEST['message'] ?? ''; ?>
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">PHOTO</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach(getAllProducts() as $product) : ?>
                  <tr>
                    <th scope="row"><?=$product['id']?></th>
                      <td><img src="<?php echo "../public/uploads/" . $product['images'] ?? "../public/uploads/daughter.jpg"; ?>" class="img-thumbnail" alt="picture">
                      </td>
                    <td class="tm-product-name"><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['category']; ?></td>
                    <td>
                      <a href="../controllers/product-controller.php?method=edit&id=<?=$product['id']?>" class="tm-product-delete-link">
                        <i class="far fa-edit tm-product-edit-icon"></i>
                      </a>
                    </td>
                    <td>
                      <a href="../controllers/product-controller.php?method=delete&id=<?=$product['id']?>" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  
                  <?php endforeach; ?>
                
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a href="add-product.php"
              class="btn btn-primary btn-block text-uppercase mb-3">
                Add new product</a>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">


              <table class="table tm-table-small tm-product-table">
                <tbody>
                  <?php
                  $categories = getAllCategories(); 
                  foreach($categories as $category):  ?>

                  <tr>
                    <td class="tm-product-name"><?php echo $category['name'] ?></td>
                    <td class="text-center">
                      <a href="../controllers/category-controller.php?method=edit&id=<?= $category['id'] ?> " class="tm-product-delete-link">
                        <i class="far fa-edit tm-product-edit-icon"></i>
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="../controllers/category-controller.php?method=delete&id= <?= $category['id'] ?> " class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>

                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a href="add-category.php" class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </a>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved. 
          
          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>

    <script src="../public/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      // $(function() {
      //   $(".tm-product-name").on("click", function() {
      //     window.location.href = "edit-product.php";
      //   });
      // });
    </script>
  </body>
</html>