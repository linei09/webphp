<?php include('../../model/admin/partials/menu.php'); ?>
<link rel="stylesheet" href="../../model/css/admin.css">

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                //get the id and all other detail
                $id = $_GET['id'];
                //sql query
                $sql ="SELECT * FROM tbl_category WHERE id=$id";
                //execute the query
                $res = mysqli_query($conn, $sql);
                //count the row to check the id id vaild or not
                $count = mysqli_num_rows($res);
                if($count ==1)
                {
                    //get all the data
                    $row =mysqli_fetch_assoc($res);
                    $title= $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {
                    // redirect to message
                    $_SESSION['no-category-found'] = "<div class ='error'> Category not Found.</div>";
                    header('location:'.'manage-category.php');
                }
            }
            else
            {
                //redirect to message
                header('location:'.'manage-category.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name='title' value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image !="")
                            {
                                //display the img
                                ?>
                                <img src="<?php echo SITEURL; ?>model/images/category/<?php echo $current_image; ?>">
                                <?php
                            }
                            else
                            {
                                //display message
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>                        
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php

            if(isset($_POST['submit']))
            {
                //get all value from form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //updating new image
                if(isset($_FILES['image']['name']))
                {
                    //get the image detail
                    $image_name =$_FILES['image']['name'];

                    //check img available or not
                    if($image_name !="")
                    {
                        //upload new image
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
                       if($current_image!="")
                       {
                            //remove the current img
                            $remove_path = "../../model/images/category/".$current_image;
                            $remove = unlink($remove_path);
                            //check the img removerd or not
                            if($remove == false)
                            {
                                $_SESSION['failed-remove'] = "<div cklass = 'error'> Failed to remove current Image.</div>";
                                header('location:'.'manage-category.php');
                                die();
                            }
                       }

                    }
                    else
                    {
                        $image_name= $current_image;
                    }
    
                }
                else
                {
                    $image_name= $current_image;
                }

                //update the database
                $sql2 = "UPDATE tbl_category SET
                    title ='$title',
                    image_name= '$image_name',
                    featured='$featured',
                    active='$active'
                    WHERE id = $id
                ";
                //execute query
                $res2 = mysqli_query($conn, $sql2);

                //redirect
                if($res2 ==true)
                {
                    $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                    header('location:'.'manage-category.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                    header('location:'.'manage-category.php');
                }
            }
        ?>

    </div>
</div>

<?php include('../../model/admin/partials/footer.php'); ?>