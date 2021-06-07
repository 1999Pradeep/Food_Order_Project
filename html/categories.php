<?php include('partials-front/menu.php'); ?>

    <!-- Categories Section -->
    <section class="categories">
      <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        

        <?php 

//Display all the cateories that are active
//Sql Query
$sql = "SELECT * FROM tbl_category WHERE active='Yes'";

//Execute the Query
$res = mysqli_query($conn, $sql);

//Count Rows
$count = mysqli_num_rows($res);

//CHeck whether categories available or not
if($count>0)
{
    //CAtegories Available
    while($row=mysqli_fetch_assoc($res))
    {
        //Get the Values
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name'];
        ?>
        
        <a href="<?php echo SITEURL; ?>html/categories-food.php?category_id=<?php echo $id; ?>">
            <div class="box float-container">
                <?php 
                    if($image_name=="")
                    {
                        //Image not Available
                        echo "Image not found";
                    }
                    else
                    {
                        //Image Available
                        ?>
                        <img src="<?php echo SITEURL; ?>img/category/<?php echo $image_name; ?>" alt="Pizza" class="image img-curve">
                        <?php
                    }
                ?>
                

                <h3 class="float-text"><?php echo $title; ?></h3>
            </div>
        </a>

        <?php
    }
}
else
{
    //CAtegories Not Available
    echo "Category not found";
}

?>

        <div class="clearfix"></div>
      </div>
    </section>

    <?php include('partials-front/footer.php'); ?>
