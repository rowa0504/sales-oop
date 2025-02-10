<?php
include "../classes/Product.php";

// Create an object
$product = new Product;

// Call the Method
if(isset($_POST['pay_product'])){
  $id = $_GET['id'];
  $buy_quantity = $_POST['buy_quantity'];

  $product->calculateStock($id, $buy_quantity);
}
