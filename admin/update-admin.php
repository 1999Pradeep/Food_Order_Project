<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br>

        <?php 
        
        //1. Get the id of selected admin
          $id=$_GET['id'];

        //2. Create sql query to get details
          $sql="SELECT * FROM tbl_admin WHERE id=$id";
          
          //execute the query
          $res=mysqli_query($conn, $sql);

          //Check whether the query executed or not
          if($res==true)
          {
              // Check whether data is available or not
              $count = mysqli_num_rows($res);

              //Check whether we have admin data or not
              if($count==1)
              {
                //GET the datails
                $row=mysqli_fetch_assoc($res);

                $full_name = $row['full_name'];
                $username = $row['username'];

              }
              else
              {
                   //Redirect to manage admin page
                   header('location:'.SITEURL.'admin/manage-admin.php');
              }
          }

        ?>

        <br><br>

        <form action="" method="POST">

             <table>
                 <tr>
                     <td>Full Name</td>
                     <td>
                         <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                     </td>
                 </tr>

                 <tr>
                     <td>User Name</td>
                     <td>
                         <input type="text" name="username" value="<?php echo $username; ?>">
                     </td>
                 </tr>

                 <tr>
                     <td colspan="2">
                         <input type="hidden" name="id" value="<?php echo $id; ?>">
                         <input type="submit" name="submit" value="Update Admin" class="btn">
                     </td>
                 </tr>
             </table>
        </form>
    </div>
</div>

<?php

//Check whether the submit buttom is clicked or not
if(isset($_POST['submit']))
{
    // Get al the value from the form to update
    $id = $_POST['id'];
   echo $full_name = $_POST['full_name'];
   echo $username = $_POST['username'];

   //Create a sql query to update admin
   $sql ="UPDATE tbl_admin SET
   full_name = '$full_name',
   username = '$username'
   WHERE id='$id'
   ";

   //Execute the query
   $res = mysqli_query($conn, $sql);

   // Check whether the query executed successfully or not
   if(res==true)
   {
       //Query executed and admin update
       
       $_SESSION['update'] = "Admin Updated Successfully";

       //Redirect to manage admin page
       header('location:'.SITEURL.'admin/manage-admin.php');
   }
   else{
       //Failed to update admin
       $_SESSION['update'] = "Failed to Delete Admin";

       //Redirect to manage admin page
       header('location:'.SITEURL.'admin/manage-admin.php');
   }
}

?>


<?php include('partials/footer.php') ?>