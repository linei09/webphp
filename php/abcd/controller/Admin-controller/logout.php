<?php
   // include constants.php
   include ('../../model/config/constants.php');
   //1. destroy  the session 
   session_destroy();
    //2. redirect to login page 
    header('location:'.SITEURL.'controller/Admin-controller/login.php');
?>
