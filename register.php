<?php 
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.13.1/bootstrap-icons.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Register</title>

    <style>
        body {
            background-color: #0d2a4a;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card p-4" style="max-width: 600px; width: 100%;">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pass" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" name="pass" id="pass" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="conPass" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" name="conPass" id="conPass" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary form-control" name="signup">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script></script>
</html>
<?php
    if(isset($_POST['signup'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $conPass = mysqli_real_escape_string($conn, $_POST['conPass']);


        if($pass != $conPass){
            echo "<script>alert('The paswword doesn't match!');</script>";
        }
        else {
            $query = "INSERT INTO accounts (`email`, `password`) VALUES ('$email', '$pass')";
            $result = mysqli_query($conn, $query);
        }
        header("Location: index.php");
        exit();
    }
?>

