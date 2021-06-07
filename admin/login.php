  <?php include('../config/constants.php'); ?> 


<html>
<head>
<title>Login Food Order</title>
<link rel="stylesheet" href="../css/admin.css" >
</head>

<body>
    
    <div class="login">
    <h1 class="text-center">Login</h1><br><br>

    <?php 
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset ($_SESSION['login']);
    }

    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset ($_SESSION['no-login-message']);
    }
    
    ?>
    <br><br>

     <form action="" method="POST" class="text-center">
     User Name <br>
     <input type="text" name="username" placeholder="Enter User Name" class="login-input"> <br><br>

     Password <br>
     <input type="password" name="password" placeholder="Enter Password" class="login-input"><br><br>


     <input type="submit" name="submit" value="Login" class="login-btn"><br>

     
     </form>

    </div>

</body>
</html>


<!-- Check Whether submit botton is clicked or not  -->
<?php
if(isset($_POST['submit']))
{
   //Process for Login
   //1. GEt the data from login form
   $username = $_POST['username'];
   $password = md5($_POST['password']);

   //2.Sql to check the user exists or not
   $sql ="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

   //3.Execute the query
   $res =mysqli_query($conn ,$sql);

   //4.Count rows to check whether the user exists or not
   $count =mysqli_num_rows($res);

   if($count==1)
   {
       //User available and login success
       $_SESSION['login'] = "Login Successfull";
       $_SESSION['user'] = $username;// to check the user is logged in or not and logout will unset it

       //Redirect to Admin Home Page
       header('location:'.SITEURL.'admin/');
   }
   else
   {
    //User not available and login Fail
    $_SESSION['login'] = "Login failed";

    //Redirect to Login Page
    header('location:'.SITEURL.'admin/login.php');

   }

}


?> 