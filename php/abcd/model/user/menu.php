<?php 
include('..\config\constants.php'); 
include('../../controller/User-controller/check-user-login.php');
?>


<html>
    <head>
        <title>Food Order Website - Home Page</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="../../view/categories.php">Category</a></li>
                <li><a href="../../view/foods.php">Food</a></li>
                <li><a href="../../controller/User-controller/user-logout.php">Logout</a></li>
            </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->