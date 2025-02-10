<?php
session_start();
require '../classes/Product.php';

$product_obj = new Product();
$product_data = $product_obj->getProductById($_GET['id']);  // getProductByIdを使って特定の商品情報を取得

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
  <title>Payment</title>
</head>

<body class="bg-light">
  <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card w-50">
      <div class="row h-100 m-0">
        <div class="bg-white border-0 py-2">
          <h1 class="text-center text-success"><i class="fa-solid fa-hand-holding-dollar"></i> Payment</h1>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <h2 id="product_name"><?= $product_data['product_name'] ?></h2>
          </div>

          <div class="row mb-3">
            <div class="col">
              <label for="price" class="label w-100">Total Price</label>
              <h2 id="product_name"><?= $product_data['price'] * $_POST['buy_quantity'] ?>$</h2>
            </div>
            <div class="col">
              <label for="quantity" class="label w-100">Buy Quantity <span class="text-danger">*</span></label>
              <h2 id="quantity"><?= $_POST['buy_quantity'] ?></h2>
              <div class="text-danger">Maximum of <?= $product_data['quantity'] ?></div>
            </div>
          </div>

          <div class="input-group mb-3">
              <label for="payment" class="form-label me-2">Payment</label>
              <span class="input-group-text">$</span>
              <input type="number" class="form-control text-center fw-bold text-danger" min="<?= $product_data['price'] * $_POST['buy_quantity'] ?>" aria-label="Amount (to the nearest dollar)" name="payment" id="payment">
          </div>

          <form action="../actions/payment.php" method="post">
            <a href="dashboard.php">
              <button type="submit" class="btn btn-success text-light w-100" name="pay_product">Pay</button>
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>