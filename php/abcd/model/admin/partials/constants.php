<?php
        //start sessions
        session_start();
        
        define('SITEURL','http://tranthanhtruc.dev/web/');
        define('LOCALHOST','localhost');
        define('DB_USERNAME','tranthan_food-order');
        define('DB_PASSWORD','tranthan_food-order');
        define('DB_NAME','tranthan_food-order');
        // create constants to store non repeating values
        $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error()); // Database connection
        $db_select = mysqli_select_db($conn,DB_NAME) or die (mysqli_error()); // Database selection
?>