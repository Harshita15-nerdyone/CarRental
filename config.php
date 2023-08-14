<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'login');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

// 


//     // $email = $_POST["email"];
//     // $password = $_POST["password"];

//     // $sql = "SELECT * FROM users WHERE email = '$email'";
//     // $result = $conn->query($sql);

//     // if ($result->num_rows == 1) {
//     //     $row = $result->fetch_assoc();
//     //     if (password_verify($password, $row["password"])) {
//     //         echo "Login successful!";
//     //         // Start a session and store user data as needed
//     //         session_start();
//     //         $_SESSION["email"] = $email;
//     //     } else {
//     //         echo "Incorrect password.";
//     //     }
//     // } else {
//     //     echo "User not found.";
//     // }

//     // $conn->close();

// 