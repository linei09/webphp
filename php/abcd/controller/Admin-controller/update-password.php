<?php include('../../model/admin/partials/menu.php'); ?>
<link rel="stylesheet" href="../../model/css/admin.css">
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if (isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>current password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="current password">
                    </td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New password" >
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary" >
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit']))
{
    //echo "clicked";
    // get the dat from form
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);

    // check whether the current ID and current password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE id='$id' AND password='$current_password'";

    //execute the query
    $res = mysqli_query($conn, $sql);

    if ($res==true)
    {
        // check whether data is available or not 
        $count = mysqli_num_rows($res);
        if ($count==1)
        {
            //user exits and password can be change
            // echo "user found";
            // check whether the new password and the confirm password is match or not
            if($new_password==$confirm_password)
            {
                //update password
                //echo "password match";
                $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id ='$id'
                ";
                //execute the Query
                $res2=mysqli_query($conn, $sql2);
                // check whether the query is executed or not
                if ($res==true)
                {
                    //display success message
                    // user not exist set message and redirect 
                    $_SESSION['change-pwd']="<div class='success'> password changed </div>";
                    //redirect the user
                    header('location:'.'manage-admin.php');
                }
                else 
                {
                    //display failed message
                    // user not exist set message and redirect 
                    $_SESSION['change-pwd']="<div class='error'> failed to change password </div>";
                    //redirect the user
                    header('location:'.'manage-admin.php');
                }
            }
            else
            { 
                // user not exist set message and redirect 
                $_SESSION['pwd-not-match']="<div class='error'> password not match </div>";
                //redirect the user
                header('location:'.'manage-admin.php');
            }
        }
        else
        {
            // user not exist set message and redirect 
            $_SESSION['user-not-found']="<div class='error'> user not found </div>";
            //redirect the user
            header('location:'.'manage-admin.php');
        }
    }
}
?>

<?php include('../../model/admin/partials/footer.php'); ?>