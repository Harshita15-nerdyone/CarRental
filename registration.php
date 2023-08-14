<?php
require_once "config.php";

$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM customers WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['username']);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong";
            }
        }
    }
            mysqli_stmt_close($stmt);
        }


    // Check for email
    if (empty(trim($_POST['email']))) {
        $email_err = "Email cannot be blank";
    } else {
        $email = trim($_POST['email']);
    }

    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for confirm password field
    if (trim($_POST['password']) != trim($_POST['confirm_password'])) {
        $confirm_password_err = "Passwords should match";
    }

   // ...

// If there were no errors, go ahead and insert into the database
if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
    $sql = "INSERT INTO customers ( username, email, password) VALUES (?, ?,?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            header("location:Login.php");
        } else {
            echo "Something went wrong... cannot redirect!";
        }
    }
        mysqli_stmt_close($stmt);
    //      else {
    //     echo "Something went wrong with the database connection.";
    // }
}

mysqli_close($conn);

// ...

?>
<!-- ... (Rest of your HTML and CSS) ... -->

<!-- HTML -->
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
                <label>Username:</label>
                <input type="text" class="form-control" name="username" required>
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
    