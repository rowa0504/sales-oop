<?php
session_start();

require '../classes/User.php';
require '../classes/Product.php';

$user = new User;
$all_users = $user->getAllUsers();

$product = new Product;
$all_products = $product->getAllProducts();

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Dashboard</title>
</head>

<body>
  <nav class="navbar navbar-expand navbar-dark bg-light" style="margin-bottom: 80px;">
    <div class="container">
      <a href="dashboard.php" class="navbar-brand text-start">
        <h1 class="h3 text-dark"><i class="fa-solid fa-house"></i></h1>
      </a>
      <div class="navbar-nav text-center">
        <span class="navbar-text text-dark">Welcome, <?= $_SESSION['username'] ?></span>
      </div>
      <form action="../actions/logout.php" method="post" class="d-flex ms-2 text-end">
        <button type="submit" class="text-danger border-0"><i class="fa-solid fa-user-xmark"></i></button>
      </form>
    </div>
  </nav>
  <main class="row justify-content-center gx-0">
    <div class="col-6">
      <div class="d-flex justify-content-between align-items-center">
        <div class="h2 text-start">Product List</div>
        <a href="add-product.php" class="text-info text-end">
          <i class="fa-solid fa-plus"></i>
        </a>
      </div>
      <?php
      if ($all_products->num_rows == 0) {
      ?>
        <div class="text-center bg-dark text-danger py-5">
          <p class="h5 pt-5">No Record Found</p>
          <p class="h1 pb-5"><i class="fa-regular fa-circle-xmark"></i></p>
        </div>
      <?php
      } else {
      ?>
        <table class="table align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th><!--for an edit & delete action buttons --></th>
              <th><!--for an extra activity action buttons --></th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($product = $all_products->fetch_assoc()) {
            ?>
              <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['product_name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td>
                  <a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-warning" title="Edit">
                    <i class="fa-regular fa-pen-to-square"></i>
                  </a>
                  <a href="delete-product.php?id=<?= $product['id'] ?>" class="btn btn-danger" title="Delete">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </td>
                <td>
                  <a href="buy-product.php?id=<?= $product['id'] ?>" class="btn btn-success" title="Edit">
                    <i class="fa-solid fa-cash-register"></i>
                  </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      <?php
      }
      ?>

</html>