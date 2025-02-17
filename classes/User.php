<?php

require_once "Database.php";

class User extends Database
{
  public function store($request)
  {
    $first_name = $request['first_name'];
    $last_name  = $request['last_name'];
    $username   = $request['username'];
    $password   = $request['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`)
            VALUES ('$first_name', '$last_name', '$username', '$password')";
  

    if ($this->conn->query($sql))
    {
      header('location: ../views');
      exit;
    } 
    else
    {
      die ('Error creating the user: ' . $this->conn->error);
    }
  }

  public function login($request)
  {
    $username   = $request['username'];
    $password   = $request['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = $this->conn->query($sql);

    if ($result->num_rows == 1)
    {
      // Check if the password is correct
      $user = $result->fetch_assoc();
      // $user = ['id' =>1, 'username'=>'john', 'password'=>'$3yhfdhfks'...'];
      if (password_verify($password, $user['password']))
      {
        // create session variables fot future use
        session_start();
        $_SESSION['id']        = $user['id'];
        $_SESSION['username']  = $user['username'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        header('location: ../views/dashboard.php');
        exit;
      }
      else
      {
        die('Password is incorrect');
      }
    }
    else
    {
      die('Username not found.');
    }
  }

  public function logout()
  {
    session_start();
    session_unset();
    session_destroy();

    header('location: ../views');
    exit;
  }

  public function getAllUsers()
  {
    $sql = "SELECT id, first_name, last_name, username FROM users";

    if($result = $this->conn->query($sql)){
      return $result;
    }
      else
    {
      die ('Error retrieving all users; ' . $this->conn->error);
    }
  }

  public function getUser()
  {
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE id = $id";

    if($result = $this->conn->query($sql))
    {
      return $result->fetch_assoc();
    }
    else
    {
      die('Error retrieving the user; ' . $this->conn->error);
    }
  }
}
