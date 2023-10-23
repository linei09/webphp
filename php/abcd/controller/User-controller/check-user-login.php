<?php
//authorization - Access control
// check whether the user is login or not
if (!isset($_SESSION['user']))
{
    //user is not login 
    //redirect to login page
    $_SESSION['no-user-login-message'] = " <div class = 'error text-center'> please log in . </div>";
    // redirect to login page
    header('location:'.SITEURL.'user-login.php');
}
?>