<?php include('../../model/admin/partials/menu.php'); ?>
<link rel="stylesheet" href="../../model/css/admin.css">
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
           if(isset($_SESSION['add'])) // checking whether the SESSION is set or not
           {
            echo $_SESSION['add']; // Display Session message
            unset($_SESSION['add']); // remove Session message
           }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">

                <tr>
                    <td>Full name</td>
                    <td><input type="text" name="full_name" placeholder="Enter your full name">
                </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter your username">
                </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter your password">
                </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" values="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php include('../../model/admin/partials/footer.php'); ?>

<?php
    // Process the values from form and save it in database

    // Check whether the submit button is click or not

    if(isset($_POST['submit']))
    {
        // button click
        // echo "button clicked";
        
        // get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password']; //Password Encryption with MD5

        // SQL Query to save the data into database

        $sql = "INSERT INTO tbl_admin SET 
           full_name='$full_name',
           username='$username',
           password='$password'
        ";

        //3. Execute Query and Save data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //check whether the (Query is executed ) data is inserted or not and display appropriate message
        if ($res==true)
        {
            //echo "data inserted";
            //create a sessions variable to display message
            $_SESSION['add'] = " Admin add successfully";
            //redirect page to manage admin
            header("location:".'manage-admin.php');
        }
        else 
        {
            //echo "failed to insert data";
            //create a sessions variable to display message
            $_SESSION['add'] = "Fail to add Admin";
            //redirect page to add admin
            header("location:".'add-admin.php');
        }
    }
?>