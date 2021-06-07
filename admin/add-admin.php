<!-- Menu Section -->
<?php include('partials/menu.php');?>

<!-- Main Content -->
<div class="main-content">
<div class="wrapper">

<h1>Add Admin</h1>
<br> <br>

<?php

if(isset($_SESSION['add']))// Checking whether the session is set or not
{
  echo $_SESSION['add'];// Display session message
  unset($_SESSION['add']);// Removing session message
}

?>

<form action="" method="POST">

<table>
<tr>
<td>Full Name</td>
<td><input type="text" name="full_name" placeholder="Enter The Name"></td>
</tr>

<tr>
<td>User Name</td>
<td><input type="text" name="username" placeholder='UserName'></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="password" placeholder="Set Password"></td>
</tr>

<tr>
<td colspan="2">
<input type="submit" name="submit" value="Add Admin" class="btn">
</td>
</tr>

</table>

</form> 

</div>
</div>



<!-- Footer Section -->
<?php include('partials/footer.php'); ?>


<?php

// Process the value from form and save it Database

// Check whether the buttom is clicked or not
if(isset($_POST['submit']))
{

    // 1. Get  the data from form
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];
     $password = md5($_POST['password']); //Encryption

     // 2. SQl Query to save data into database
     $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password ='$password'
            ";

// 3. Executing Query and saving data into database
       $res = mysqli_query($conn, $sql) or die(mysqli_error());

// 4. Check whether the (Query is executed) data is inserted or not display appropriate message
       if($res==TRUE)
       {
          // Data inserted
          // Create a session vaiable to display message
          $_SESSION['add'] = "Admin Added Successfully";
          //Redirect Page manage admin
          header("location:".SITEURL.'admin/manage-admin.php');

       }

       else
       {
        // Failed to insert
        $_SESSION['add'] = "Failed to Add Admin";
        //Redirect Page
        header("location:".SITEURL.'admin/add-admin.php');

       }

}

?>