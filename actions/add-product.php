<?php
include "../classes/Product.php";

// Create an object
$product = new Product;

// Call the Method
$product->store($_POST);
