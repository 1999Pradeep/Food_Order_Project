<?php include('partials/menu.php'); ?>

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

<!-- Add Category form  -->
<form action="" method="POST" enctype="multipart/form-data">

<table>

<tr>
<td>Tilte</td>
<td>
<input type="text" name="title" placeholder="Category Title">
</td>
</tr>

<tr>
    <td>Select Image</td>
    <td>
        <input type="file" name="image">
    </td>
</tr>

<tr>
<td>Featured</td>
<td>
    <input type="radio" name="featured" value="Yes"> Yes
    <input type="radio" name="featured" value="No"> No
</td>
</tr>

<td>Active</td>
<td>
    <input type="radio" name="active" value="Yes"> Yes
    <input type="radio" name=active" value="No"> No
</td>
</tr>

<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Category" class="btn">
    </td>
</tr>

</table>

</form>

<?php 

// Check buttom is clicked or not
if(isset($_POST['submit']))
{
    // echo "clicked";

    // Get the value from form 
    $title = $_POST['title'];

    //for Radio input, we need to check the button is clicked or not
    if(isset($_POST['featured']))
    {
        //Get the value from form
        $featured =$_POST['featured'];
    }
    else
    {
        //Set the default value
        $featured = "No";
 
    }

    //For active
    if(isset($_POST['active']))
    {
        //Get the value from form
        $active =$_POST['active'];
    }
    else
    {
        //Set the default value
        $active = "No";
 
    }

//Check the image is selected or not and set the value for image accoridly
// print_r($_FILES['image']);

// die();//Break the code here

if(isset($_FILES['image']['name']))
{
    //Upload the image
    // To upload the iamge we need image name, source path and destination path
    $image_name = $_FILES['image']['name'];

    //Upload the Image only if image is selected
    if($image_name !="")
    {

    //Auto rename image
    //Get the extension of image(jpj,png,gif,etc) e.g food.jpj
    $ext = end(explode('.',$image_name));

    //Rename the image
    $image_name ="Food_Img_".rand(000, 999).'.'.$ext;//e.g food_img_68.jpg

    $source_path = $_FILES['image']['tmp_name'];

    $destination_path = "../img/category/".$image_name;

    //Finally upload the image
    $upload = move_uploaded_file($source_path, $destination_path);

    //Check the image is uploaded or not
    //and if image is not uploaded then stop the process
    //and redirect with error message
    if($upload==false)
    {
        //Set message
        $_SESSION['upload'] ="Failed to Upload Image";
        //Redirect to Add Category
        header('location:'.SITEURL.'admin/add-category.php');
        //Stop the process
        die();
    }

 }

}
else
{

//Don't upload image and set the image_name value as blank
$image_name ="";
}


//2. Create sql query to insert category into database
$sql = "INSERT INTO tbl_category SET
      title ='$title',
      image_name ='$image_name',
      featured ='$featured',
      active ='$active'
      ";

      //3.Execute the query and save in the database
      $res = mysqli_query($conn, $sql);

      //4. check the query is executed or not
      if($res==true)
      {
          //Query executed and add category
          $_SESSION['add'] ="Category is Added Successfully";
          //Redirect to manage Category Page
          header('location:'.SITEURL.'admin/manage-category.php');
      }
      else
      {
          //Failed to add category
          $_SESSION['add'] ="Failed to ADD Category";
          //Redirect to manage Category Page
          header('location:'.SITEURL.'admin/add-category.php');
      }

}

?>

</div>

</div>


<?php include('partials/footer.php'); ?>