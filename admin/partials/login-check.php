<?php

//Authorization - Access control
// Check the user is logged or not
if(!isset($_SESSION['user']))//if user session is not set
{
//User is not logged in
//Redirect to login page with message
$_SESSION['no-login-message'] ="Please login to access Admin panel";

//Redirect to login page
header('location:'.SITEURL.'admin/login.php');
}

?>