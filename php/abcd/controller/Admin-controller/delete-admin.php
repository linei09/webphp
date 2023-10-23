<link rel="stylesheet" href="../../model/css/admin.css">
<?php
    // include  constants.php file here
    include('../../model/config/constants.php');
    

    //1. get the id of admin to be deleted 
    $id = $_GET['id'];
    //2. create SQL Query to delete Admin
    $sql = "DELETE  FROM  tbl_admin WHERE id=$id";

    //execute the Query
    $res = mysqli_query($conn, $sql);

    // check whether the Query executed successfully or not 
    if ($res==true)
    {
        // Query executed successfully and admin is deleted
        //echo " Admin deleted";
        //create session variable to display message
        $_SESSION['delete'] = "<div class='success'> Admin Deleted Successfully </div>";
        //Redirect to manage Admin Page
        header('location:'.'manage-admin.php');
    }
    else 
    {
        // failed to deleted admin 
        //echo "failed to delete admin ";
        $_SESSION['delete'] = "<div class='error'>Failed to delete Admin. Please try again </div>";
        header('location:'.'manage-admin.php');
    }
    // redirect to manage admin page with message (success/error)
?>