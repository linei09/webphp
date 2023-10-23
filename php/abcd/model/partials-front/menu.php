<?php include('../model/config/constants.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../model/css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <?php
        if (isset($_SESSION['user-login']))
        {
            echo $_SESSION['user-login'];
            unset ($_SESSION['user-login']);
        }
        ?>

    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>view" title="Logo">
                    <img src="../model/images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>view/index.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>view/categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>view/foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>controller/Admin-controller/login.php">Admin Login</a>
                    </li>
                    <li>
                    <a href="<?php echo SITEURL; ?>controller/User-controller/user-login.php">User Login</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    