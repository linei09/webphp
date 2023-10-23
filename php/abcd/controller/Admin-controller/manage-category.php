<?php include('../../model/admin/partials/menu.php'); ?>
<link rel="stylesheet" href="../../model/css/admin.css">
<div class="main-content">
    <div class="wrapper">
        <h1> Manage Category</h1>        
        <br><br>
        <?php
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['no-category-found']))
        {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['failed-remove']))
        {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }
        ?>

        <br /><br />
            <!-- button add admin -->
            <a href="add-category.php" class="btn-primary">Add Category</a>

            <br /><br />
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                    //query to get all from db
                    $sql ="SELECT * FROM tbl_category";

                    //ễcute query
                    $res = mysqli_query($conn,$sql);

                    //count rows
                    $count = mysqli_num_rows($res);

                    //create S/N
                    $sn = 1;

                    //check 
                    if($count>0)
                    {
                        //we have data in database
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active =$row['active'];
                            ?>
                                <tr>
                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $title ?></td>
                                    <td>
                                        <?php 
                                        if($image_name!="")
                                        {
                                            //display the image
                                            ?>
                                            <img width="250px" src="<?php echo SITEURL; ?>model/images/category/<?php echo $image_name; ?>">
                                            <?php
                                        }
                                        else
                                        {
                                            echo "<div class='error'> Image not Added.</div>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $featured ?></td>
                                    <td><?php echo $active ?></td>
                                
                                    <td>
                                        <a href="update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                        <a href="delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Category</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        ?>

                        <tr>
                            <td colspan="6"><div class="error">No Category Added.</div></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
    </div>
</div>
<?php include('../../model/admin/partials/footer.php'); ?>
