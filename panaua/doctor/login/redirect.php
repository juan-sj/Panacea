<?php
session_start();
include('../db/connectionI.php');

$myusername=$_POST['UserName']; 
$mypassword=$_POST['Password']; 

$tbl_name="doctor";
$sql="SELECT * FROM $tbl_name WHERE doctor_email='$myusername' and doctor_password='$mypassword'";
$result=mysqli_query($con,$sql);

$count=mysqli_num_rows($result);
if($count == 1)
{
  while($row = mysqli_fetch_array($result))
  {
	$_SESSION['user'] ="doctor";
	$_SESSION['email'] =$row['doctor_email'];
	$_SESSION['doctor_id']=$row['id'];
	$_SESSION['doctor'] =$myusername;
	$_SESSION['login'] ="1";
	header("location:../dashboard/dashboard.php");
  }
}
else
header("location:login.php");

?>
 
 



