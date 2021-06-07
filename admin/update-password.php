<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
<h1>Change Password</h1>
<br>

<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
}

?>


<form action="" method="POST">

<table>

<tr>
<td>Current Password:</td>
<td>
<input type="password" name="current_password" placeholder="current password" >
</td>
</tr>

<tr>
<td>New Password</td>
<td>
<input type="password" name="new_password" placeholder="new password">
</td>
</tr>

<tr>
<td>Confirm Password</td>
<td>
<input type="password" name="confirm_password" placeholder="confirm password">
</td>
</tr>

<tr>
<td colspan="2">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" name="submit" value="Change Password" class="btn">
</td>
</tr>

</table>


</form>

</div>
</div>


<?php

//Check whether the submit buttom is clicked
if(isset($_POST['submit']))
{
    //1. Get data from form
       $id=$_POST['id'];
       $current_password =md5($_POST['current_password']);
       $new_password =md5($_POST['new_password']);
       $confirm_password =md5($_POST['confirm_password']);

    //2.Check whether user,id and password exists are not
       $sql ="SELECT * FROM tbl_admin Where id=$id AND password='$current_password'";

       //Execute the query
       $res =mysqli_query($conn, $sql);

       if($res==true)
       {
           //Check whether data is available or not
           $count=mysqli_num_rows($res);

           if($count==1)
           {
               //User exsists password can be changed

               //Check the new password and confirm password is same or not

            if($new_password==$confirm_password)
            {
                //Update password
                $sql2 ="UPDATE tbl_admin SET
                password='$new_password'
                WHERE id=$id
                ";

                //Execute the query
                $res2 =mysqli_query($conn, $sql2);

                //CHeck query executed or not
                if($res2==true)
                {
                  //Display success message
                  $_SESSION['change-pwd'] ="Password Changed Successfully";

                  //redirect the user
                  header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else
                {
                  //Diaplay error message
                  $_SESSION['change-pwd'] ="Failed To Change Password";

                  //redirect the user
                  header('location:'.SITEURL.'admin/manage-admin.php');
                  
                }
            }
            else
            {
                //Redirect to manage admin page with error message
                $_SESSION['pwd-not-match'] ="Password Did Not Match";

                //redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
           }
           else
           {
              //User does not exsists set message and redirect
              $_SESSION['user-not-found'] ="User Not Found";

              //redirect the user
              header('location:'.SITEURL.'admin/manage-admin.php');
           }
       }


    //3. Check the new password and confirm password match or not


    //4. Change if all above is true
}

?>



<?php include('partials/footer.php'); ?>