<!DOCTYPE html>
<html>
<head>
    <title>Car Rental</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('Car.jpg'); /* Adjust the path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 100px 20px;
            text-align: center;
            color: #ffff;
        }

        .icon {
            font-size: 100px;
            margin: 20px;
            cursor: pointer;
            color: #007bff;
        }

        .icon:hover {
            color: #0056b3;
        }

        .icon a {
            text-decoration: none;
            color: inherit;
        }

        .icon p {
            margin: 2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Rent, Drive, Explore: Your Car Rental Adventure Awaits</h2>
        <div class="icon">
            <a href="login.php?type=customer">
                <i class="fas fa-user"></i>
                <p>Customers</p>
            </a>
        </div>
        <div class="icon">
            <a href="AgencyLogin.php?type=agency">
                <i class="fas fa-building"></i>
                <p>Car Rental Agency</p>
            </a>
        </div>
    </div>
    
    <!-- Include Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
