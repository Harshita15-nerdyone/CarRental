<?php
session_start();

if(isset($_SESSION['username'])) {
    header("location:AvailableCars.php");
    exit();
}

require_once "config.php";

$username = $email= $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password']))) {
        $err = "Please enter both email and password";
    } else {
        $username = trim($_POST['email']);
        $password = trim($_POST['password']);
    }

    if(empty($err)) {
        $sql = "SELECT id, username,email password FROM customers WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username , $param_email);
            $param_username = $username;
            $param_email = $email;

            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)) {
                        if(password_verify($password, $hashed_password)) {
                            $_SESSION["username"] = $username;
                            $_SESSON["email"] = $email;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            header("location: AvailableCars.php");
                            exit;
                        } else {
                            $err = "Invalid password";
                        }
                    }
                } else {
                    $err = "Username not found";
                }
            } else {
                $err = "Something went wrong";
            }
            mysqli_stmt_close($stmt);
        } else {
            $err = "Statement preparation failed";
        }
    }
}
?>
<!-- ... Rest of your HTML and form ... -->



<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  

    <style>
        body {
            background-image: url('Car.jpg'); /* Replace with the actual path to your image */
            background-size: cover;
        }
        .container {
            padding-top: 100px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
            text-align: center;
            padding: 20px;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .mt-3 {
            margin-top: 15px;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <!-- Login form -->
                        <form method="post" action="AvailableCars.php">
                            <div class="form-group">
                                <label for="email">username</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="Login">Login</button>
                        </form>
                        <!-- New Registration option -->
                        <p class="mt-3 text-center">Don't have an account? <a href="registration.php">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
