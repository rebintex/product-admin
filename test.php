<?php

require 'Models/Product.php';

$product = Product::get(5);

echo $product->name;
