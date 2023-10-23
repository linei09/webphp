<?php include('../../model/config/constants.php'); ?>
<html>
    <head>
        <title> Login - Food Order System</title>
        <link rel="stylesheet" href="../../model/css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">User Login</h1>
            <br><br>

            <?php
            if(isset($_SESSION['no-user-login-message']))
            {
                echo $_SESSION['no-user-login-message'];
                unset ($_SESSION['no-user-login-message']);
            }
            ?>
            <br><br>

            <!-- login form start here -->
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="enter username"><br><br>
                Password:  <br>
                <input type="password" name="password" placeholder="enter password"><br><br>
                <input type="submit" name="submit" value="Login" class="btn-primary">
            </form>
            <br><br>
            <!-- login form end here -->
            <p class="text-center">Do not have account?<a href="user-register.php">SIGN UP</a></p>
    </body>
</html>

<?php

// check whether the submit button is clicked or not 
if (isset($_POST['submit']))
{
    // process for login 
    // 1.get the data from login form 
    $username=$_POST['username'];
    $password=$_POST['password'];
    // 2.SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
    //execute the query 
    $res = mysqli_query($conn, $sql);
    // count rows to check whether the user exist or not 
    $count = mysqli_num_rows($res);
    if ($count==1)
    {
        // user available and login success
        $_SESSION['user-login'] = "<div class='success'> Login Successful. </div>";
        $_SESSION['user'] = $username;
        //redirect to homepage
        header('location:'.SITEURL.'model/user/index.php');
    }
    else 
    {
        // user not available and login fail
        $_SESSION['user-login'] = "<div class='error text-center' >Login failed</div>";
        //redirect to homepage
        header('location:'.SITEURL.'controller/User-controller/user-login.php');
    }
}
?>