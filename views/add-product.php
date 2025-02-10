<?php
session_start();

require '../classes/User.php';
require '../classes/Product.php';

$product = new Product();
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
  <title>Add Product</title>
</head>

<body class="bg-light">
  <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card w-50">
      <div class="row h-100 m-0">
        <div class="bg-white border-0 py-2">
          <h1 class="text-center text-info"><i class="fa-solid fa-box"></i> Add Product</h1>
        </div>
        <div class="card-body">
          <form action="../actions/add-product.php" method="post">
            <div class="mb-3">
              <label for="product_name" class="form-label">Product Name</label>
              <input type="text" name="product_name" placeholder="Enter the product name" id="product_name" class="form-control" required autofocus>
            </div>

            <div class="row mb-3">
              <div class="col input-group">
                <label for="price" class="form-label w-100">Price</label>
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" name="price" id="price" aria-label="Amount (to the nearest dollar)" required>
              </div>

              <div class="col input-group">
                <label for="quantity" class="form-label w-100">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="quantity" required>
              </div>
            </div>

            <button type="submit" class="btn btn-info text-dark w-100">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>