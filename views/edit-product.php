<?php
session_start();
require '../classes/Product.php';

// idをGETで取得して、対応する商品データを取得
$id = $_GET['id'];
$product_obj = new Product();
$product_data = $product_obj->getProductById($id);  // getProductByIdを使って特定の商品情報を取得
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
  <title>Edit Product</title>
</head>

<body class="bg-light">
  <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card w-50">
      <div class="row h-100 m-0">
        <div class="bg-white border-0 py-2">
          <h1 class="text-center text-warning"><i class="fa-solid fa-pen-to-square"></i> Edit Product</h1>
        </div>
        <div class="card-body">
          <form action="../actions/edit-product.php" method="post">
            <!-- 隠しフィールドでidを送信 -->
            <input type="hidden" name="id" value="<?= $product_data['id'] ?>">
            
            <div class="mb-3">
              <label for="product_name" class="form-label">Product Name</label>
              <!-- 商品名のフィールドに既存の値を表示 -->
              <input type="text" name="product_name" placeholder="Enter the product name" id="product_name" class="form-control" value="<?= $product_data['product_name'] ?>" required autofocus>
            </div>

            <div class="row mb-3">
              <div class="col input-group">
                <label for="price" class="form-label w-100">Price</label>
                <span class="input-group-text">$</span>
                <!-- 価格のフィールドに既存の値を表示 -->
                <input type="number" class="form-control" name="price" id="price" value="<?= $product_data['price'] ?>" aria-label="Amount (to the nearest dollar)" required>
              </div>

              <div class="col input-group">
                <label for="quantity" class="form-label w-100">Quantity</label>
                <!-- 数量のフィールドに既存の値を表示 -->
                <input type="number" class="form-control" name="quantity" id="quantity" value="<?= $product_data['quantity'] ?>" required>
              </div>
            </div>

            <button type="submit" class="btn btn-warning text-dark w-100">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
