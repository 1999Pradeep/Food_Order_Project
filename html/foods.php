<?php include('partials-front/menu.php'); ?>

    <!-- Food Search Section  -->
    <section class="food-search text-center">
      <div class="container">

        <form action="<?php echo SITEURL; ?>html/food-search.php" method="POST">
          <input
            type="search"
            name="search"
            placeholder="Search for food"
            required
          />
          <input type="submit" name="submit" value="Search" class="btn" />
        </form>

      </div>
    </section>

    <!-- Food Menu Section -->
    <section class="food-menu">
      <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php 
                //Display Foods that are Active
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                    //Foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "Image not Available";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>img/food/<?php echo $image_name; ?>" alt="Pizza" class="image img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-disp">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>html/order.php?food_id=<?php echo $id; ?>" class="btn">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not Available
                    echo "Food not found";
                }
            ?>

        <div class="clearfix"></div>
      </div>
    </section>

    <?php include('partials-front/footer.php'); ?>
