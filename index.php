<?php 
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="bootstrap-icons-1.13.1/bootstrap-icons.css" />
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <title>Log In</title>

  <style>
    body {
      background-color: #0d2a4a;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="col-md-4">
        <div class="card p-4 shadow rounded">
          <h3 class="text-center mb-4">Log In</h3>
          <form>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
          <div class="container">
            <p class="text-center mt-3">No account yet? Click <a href="register.php">Register</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>