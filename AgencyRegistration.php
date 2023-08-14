<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('Car.jpg'); /* Adjust the path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
            max-width: 400px; 
            margin-bottom:50px;/* Limit the maximum width of the container */
            margin-left: auto;
            margin-right: auto;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Registration</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Mobile No:</label>
                <input type="text" class="form-control" name="mobile" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="password" class="form-control" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password === $confirm_password) {
        // Perform database operations here if needed
        // You should hash the password before saving it in the database

        // Redirect to login page
        header("Location: AgencyLogin.php");
        exit;
    } else {
        $error_message = "Password and Confirm Password do not match.";
    }
}
?>
