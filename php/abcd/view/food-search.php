<?php include('../model/partials-front/menu.php')?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
            $search = $_POST['search'];
            ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            //sql query
            $sql2 = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            $res2 = mysqli_query($conn,$sql2);

            $count2 = mysqli_num_rows($res2);

          if($count2 > 0)
          {
            while($row2=mysqli_fetch_assoc($res2))
            {
                $id = $row2['id'];
                $title = $row2['title'];
                $price= $row2['price'];
                $description = $row2['description'];
                $image_name = $row2['image_name'];
                ?>
                <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php
                        if($image_name=="")
                        {
                            echo "<div class='error'>Image not Available</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>model/images/food/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                            <?php
                        }
                    ?>
                </div>

                <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="food-price">$<?php echo $price; ?></p>
                <p class="food-detail">
                    <?php echo $description; ?> 
                </p>
                <br>

                <a href="<?php echo SITEURL;?>view/order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
            </div>
            </div>
            <?php
            }
          } 
          else
          {
            echo "<div class='error'>Food not Added.</div>";
          } 
        ?>
            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD MEnu Section Starts Here -->

    <!-- fOOD Menu Section Ends Here -->

    <?php include('../model/partials-front/footer.php')?>