<?php include('../../model/admin/partials/menu.php'); ?>
<link rel="stylesheet" href="../../model/css/admin.css">
        <!-- Main Content Section Starts -->
        <!-- Main Content Section Ends -->
        <div class="main-content">
            <div class="wrapper">
            <h1>Manage Admin</h1>
             
             <br />
            <?php
              if(isset($_SESSION['add']))
              {
                    echo $_SESSION['add']; // Displaying SESSION message
                    unset ($_SESSION['add']);// Remove SESSION message
              }
              if(isset($_SESSION['delete']))
              {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
              }
              if(isset($_SESSION['update']))
              {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
              }
              if(isset($_SESSION['user-not-found']))
              {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
              }
              if(isset($_SESSION['pwd-not-match']))
              {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
              }
              if(isset($_SESSION['change-pwd']))
              {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
              }
               if (isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
            }
            ?>
            <br /><br /><br>


            <!-- button add admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br /><br />
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>


                <?php
                    //Query to get all admin 
                    $sql = "SELECT * FROM tbl_admin";
                    //execute the query
                    $res = mysqli_query($conn,$sql);

                    // check whether the query is execute or not
                    if ($res == true)
                    {
                        //count rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res);// function to get all rows in the database 
                        $sn=1; //create a variable and assign the values 

                        // check the num of row
                        if ($count>0)
                        {   //we have data in database
                            while ($rows = mysqli_fetch_assoc($res))
                            {
                                //using while loop to get all the data from database 

                                //get individual data
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                // display the values in our table 
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username ?></td>
                                    <td>
                                        <a href="update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                        <a href="update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="delete-admin.php?id=<?php echo $id; ?> " class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            // we do not have data in database 
                        }
                    }
                ?>
            </table>
        </div>

<?php include('../../model/admin/partials/footer.php'); ?>