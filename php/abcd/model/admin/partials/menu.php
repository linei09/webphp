<?php 
include('constants.php');
include('login-check.php');
?>


<html>
    <head>
        <title>Food Order Website - Home Page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
            <ul>
                <li><a href="<?php echo SITEURL; ?>model/admin/index.php">Home</a></li>
                <li><a href="<?php echo SITEURL; ?>controller\Admin-controller\manage-admin.php">Admin</a></li>
                <li><a href="<?php echo SITEURL; ?>controller\Admin-controller\manage-category.php">Category</a></li>
                <li><a href="<?php echo SITEURL; ?>controller\Admin-controller\manage-food.php">Food</a></li>
                <li><a href="<?php echo SITEURL; ?>controller\Admin-controller\manage-order.php">Order</a></li>
                <li><a href="<?php echo SITEURL; ?>controller\Admin-controller\logout.php">Logout</a></li>
            </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->