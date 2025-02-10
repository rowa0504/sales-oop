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
  <title>Login</title>
</head>

<body class="bg-light">
  <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card w-50">
      <div class="row h-100 m-0">
        <div class="bg-white border-0 py-3">
          <h1 class="text-center text-primary">LOGIN <i class="fa-solid fa-right-to-bracket"></i></h1>
        </div>
        <div class="card-body">
          <form action="../actions/login.php" method="post">
            <input type="text" name="username" placeholder="USERNAME" class="form-control mb-2" required autofocus>
            <input type="password" name="password" placeholder="PASSWORD" class="form-control mb-5">
            <button type="submit" class="btn btn-primary w-100">Log in</button>
          </form>
          <div class="text-center"><a href="register.php" class="btn btn-danger my-3">Create an Account</a></div>
        </div>
      </div>
    </div>
  </div>
</body>


</html>