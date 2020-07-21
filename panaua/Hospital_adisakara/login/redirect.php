<?php
session_start();
include('../db/connectionI.php');

$myusername=$_POST['UserName']; 
$mypassword=$_POST['Password']; 
 	
if($myusername=="admin" && $mypassword=="admin")
{

$_SESSION['user'] ="admin";
$_SESSION['username'] ="";
$_SESSION['login'] ="1";
header("location:../dashboard/dashboard.php");
  
}
else 
header("location:login.php"); 
  
?>
 
 



