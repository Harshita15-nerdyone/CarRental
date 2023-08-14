<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location:Login.php");
}

// Assuming you have a database connection in your config.php
require_once "config.php";

// Fetch cars from the database
$sql = "SELECT * FROM cars";
$result = mysqli_query($conn, $sql);

$carList = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $carList[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Rental</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Car Listing</h2>
        <div class="row">
            <?php foreach ($carList as $car): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="car_image.jpg" class="card-img-top" alt="Car Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= $car['name'] ?></h5>
                            <?php if ($car['availability'] == 1): ?>
                                <p class="card-text">Rent: $<?= $car['rent'] ?> per day</p>
                                <a href="#" class="btn btn-success">Rent</a>
                            <?php else: ?>
                                <p class="card-text">Out of Stock</p>
                                <a href="#" class="btn btn-secondary" disabled>Out of Stock</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
