<?php
session_start();
include('../db/connectionI.php');
//$db_name="music"; // Database name 


// Connect to server and select databse.


// username and password sent from form 
$myusername=$_POST['UserName']; 
$mypassword=$_POST['Password']; 

// To protect MySQL injection (more detail about MySQL injection)

	
if($myusername=="admin" && $mypassword=="admin")
{

$_SESSION['user'] ="admin";
$_SESSION['username'] ="";
	header("location:../dashboard/dashboard.php");
 

}
else
{
//echo "teacher $myusername $mypassword";
$tbl_name="doctor"; // Table name 
$sql="SELECT * FROM $tbl_name WHERE doctor_email='$myusername' and doctor_password='$mypassword'";
$result=mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

// Register $myusername, $mypassword and redirect to file "login_success.php"
 $result = mysqli_query($con,"SELECT * FROM $tbl_name WHERE doctor_email='$myusername' and doctor_password='$mypassword'") or die('Could not connect: ' . mysqli_error($con));
$f=0;
while($row = mysqli_fetch_array($result))
  {
$_SESSION['user'] ="doctor";

$_SESSION['email'] =$row['doctor_email'];
$_SESSION['doctor_id']=$row['id'];
$_SESSION['doctor'] =$myusername;
	header("location:../dashboard/dashboard.php");
	$f=1;
  }

if($f==0)
header("location:login.php");
 

}







?>
 
 



