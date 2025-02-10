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
  <title>Registration</title>
</head>

<body class="bg-light">
  <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card w-50 p-4">
      <div class="my-3">
        <h1 class="text-center text-danger"><i class="fa-solid fa-user-plus"></i> Registration</h1>
      </div>
      <form action="../actions/register.php" method="post">
        <div class="row mb-3">
          <div class="col">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required autofocus>
          </div>
          <div class="col">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label fw-bold">UserName</label>
          <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label fw-bold">Password</label>
          <input type="password" name="password" id="password" class="form-control fw-bold" maxlength="8" aria-describedby="password-info" required>
        </div>
        <button type="submit" class="btn btn-danger w-100">Register</button>
      </form>
    </div>
  </div>
</body>
</html>