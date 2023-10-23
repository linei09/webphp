<link rel="stylesheet" href="../../model/css/admin.css">
<?php
    include('../../model/config/constants.php');
    //check the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
          //  echo "Get Value and Delete";
          $id = $_GET['id'];
          $image_name = $_GET['image_name'];

          //remove the physical image file and available
          if($image_name !="")
          {
            //Image is available. so remove it
            $path = "../../model/images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            // if failed to remove the image then add an error message
            if($remove ==false)
            {
                //set the season message
                $_SESSION['remove']= "<div class='error'>Failed to Remove Category Image.</div>";
                //redirect to manage category page
                header('location:'.'manage-category.php');
                //stop the procress
                die();
            }
          }

          //delete data from db
          //sql querrt to delete data
          $sql = "DELETE FROM tbl_category WHERE id=$id";

          //execute the query
          $res = mysqli_query($conn, $sql);

          //Check whether the data is delete from db or not
          if($res==true)
          {
            //set the success message
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            //redirect to manage category
            header('location:'.'manage-category.php');
          }
          else
          {
            //set fail message and redirect 
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
            //redirect to manage category
            header('location:'.'manage-category.php');
          }

    }
    else
    {
        header('location'.'manage-category.php');
    }
?>