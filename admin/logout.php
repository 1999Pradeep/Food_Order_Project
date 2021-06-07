<?php 

//Include constants.php for SITEURL
include('../config/constants.php');

//1.detroy the session
session_destroy();//unsets $_SESSION['user']

//2.Redirect to logon page
header('location:'.SITEURL.'/admin/login.php');

?>