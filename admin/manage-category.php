<!-- Menu Sectiom -->
<?php include('partials/menu.php'); ?>

<!-- Main Content -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
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

<br><br>

        <a href="<?php echo SITEURL; ?>admin/add-category.php ?>" class="btn">Add Category</a>
        <br>
        <br />

        <table>
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>

            </tr>

            <?php
            
            //Query to get data from database
            $sql ="SELECT * FROM  tbl_category";

            //Execute the query 
            $res =mysqli_query($conn, $sql);

            //Count rows
            $count =mysqli_num_rows($res);

            //Create serial no variable and assign value as 1
            $sn =1;



            //Check we data in database or not
            if($count>0)
            {
               //we have data im database
               //Get the data and display
               while($row=mysqli_fetch_assoc($res))
               {
                   $id = $row['id'];
                   $title = $row['title'];
                   $image_name = $row['image_name'];
                   $featured = $row['featured'];
                   $active = $row['active'];

       ?>

            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $title; ?></td>

                <td>
                <?php 
                
                //Check image name is available or not
                if($image_name!="")
                {
                   //Display the message
                   ?>
                   
                     <img src="<?php echo SITEURL; ?>img/category/<?php echo $image_name; ?>" width="100px">
                    
                   <?php
                }
                else
                {
                    //Display the message
                    echo "No Image Not Added";
                }
                
                ?>
                </td>

                <td><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-update">Update Category</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Category</a>
                </td>
            </tr> 
                    
         <?php

               }
        
            }
            else
            {
                // we don't have data
                //we will display the message inside table
                ?>
                 <tr>
                    <td colspan="6">No Category Added</td>
                 </tr>

                <?php
            }


            ?>


        </table>
    </div>
</div>


<!-- Footer Section -->
<?php include('partials/footer.php'); ?>