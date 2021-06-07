<?php

//Include constants.php file here
include('../config/constants.php');

// 1. get the id of admin to delete
 $id = $_GET['id'];

// 2. create Sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the query
$res= mysqli_query($conn, $sql);

//Check whether the query executed successfully or not 
if($res==true)
{
    //Query executed successfully and Admin deleted
    // Create session variables to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";

    //Redirect to message admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //Failed to delete admin
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try again.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
// 3. Redirect to manage admin page with message(success)

?>