<?php

require_once "Database.php";

class Product extends Database
{
    public function store($request)
    {   
      $product_name = $request['product_name'];
      $price        = $request['price'];
      $quantity     = $request['quantity'];

        $sql = "INSERT INTO products (`product_name`, `price`, `quantity`) 
                VALUES ('$product_name', '$price', '$quantity')";
        
        if ($this->conn->query($sql)) {
            header('Location: ../views/dashboard.php');
            exit;
        } else {
            die('Error adding the product: ' . $this->conn->error);
        }
    }

    public function getAllProducts()
    {
        $sql = "SELECT id, product_name, price, quantity FROM products";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result;
        } else {
            die('Error retrieving all products: ' . $this->conn->error);
        }
    }

    public function getProduct()
    {
        $id = $_GET['product_id'];
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_assoc();
        } else {
            die('Error retrieving the product: ' . $this->conn->error);
        }
    }

    public function deleteProduct()
    {
        session_start();
        $id           = $_GET['id'];
        
        $sql = "DELETE FROM products WHERE id = $id";
        
        if ($this->conn->query($sql)) {
            header('Location: ../views/dashboard.php');
            exit;
        } else {
            die("Error deleting your product: " . $this->conn->error);
        }
    }

    public function updateProduct($request)
{
    session_start();
    // POSTで渡されたIDを取得
    $id           = $request['id'];
    $product_name = $request['product_name'];
    $price        = $request['price'];
    $quantity     = $request['quantity'];

    $sql = "UPDATE products
            SET product_name  = '$product_name',
                price         = '$price',
                quantity      = '$quantity'
            WHERE id = $id";
    
    if ($this->conn->query($sql)) {
        header('Location: ../views/dashboard.php');
        exit;
    } else {
        die("Error updating your product: " . $this->conn->error);
    }
}


  public function getProductById($id)
{
    $sql = "SELECT * FROM products WHERE id = $id";
    

    if($result = $this->conn->query($sql)){
        return $result->fetch_assoc();
    } else {
        die('Error retrieving product: ' . $this->conn->error);
    }
}

  public function calculateStock($id, $buy_quantity){
    $sql = "UPDATE products
            SET quantity = quantity - '$buy_quantity'
            WHERE id = '$id'";
    if($this->conn->query($sql)){
        header("location: ../views/dashboard.php");
        exit;
    }else{
        die("Error in calculating stock: ".$this->conn->error);
    }
}

}
