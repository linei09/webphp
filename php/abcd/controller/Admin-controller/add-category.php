<?php include('../../model/admin/partials/menu.php'); ?>
<link rel="stylesheet" href="../../model/css/admin.css">

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>
        <?php
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br><br>


        <!-- add category on from starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name ="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
                </table>
        </form>
        <!-- add category form ends-->
        <?php
            if(isset($_POST['submit']))
           { 
                //echo "clicled";
                
                // getvalue from category form
                $title = $_POST['title'];

                //for ratio input, check the button is selected or not
                if(isset($_POST['featured']))
                {
                    //get the value from form
                    $featured = $_POST['featured'];

                }
                else
                {
                    //set the default value
                    $featured = "No";
                }
                if(isset($_POST['active']))
                {
                    //get the value from form
                    $active = $_POST['active'];

                }
                else
                {
                    //set the default value
                    $active = "No";
                }

                // check image
                //print_r($_FILES['image']);
               //die();
               if(isset($_FILES['image']['name']))
               {
                    $image_name = $_FILES['image']['name'];

                    //upload image if it selected
                    if($image_name != "")
                    {
                        //rename
                        $ext = end(explode('.', $image_name));

                        $image_name="Food_Category_".rand(000,999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../../model/images/category/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check

                        if($upload==false)
                        {
                            $_SESSION['upload'] ="<div class='error'<Failed to Upload Image.</div>";
                            header('location:'.'manage-category.php');
                            die();
                        }
                    }
                    
               }
               else
               {
                    $image_name="";
               }

                //sql query
                $sql = "INSERT INTO tbl_category SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                ";

                //execute the querry and save in database
                $res = mysqli_query($conn, $sql);

                //check query executed or not and data added or not
                if($res==true)
                {
                    $_SESSION['add'] = "<div class= 'success'>Category Added Successfully.</div>";
                    header('location:'.'manage-category.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class= 'error'>Fail To Add Category.</div>";
                    header('location:'.'add-category.php');
                }

        }
        ?>
</div>