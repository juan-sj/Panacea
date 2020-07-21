<?php

include("connection.php");

$userId = $_POST['userId'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$insurance = $_POST['insurance'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = " UPDATE patient SET patient_name='$name', patient_gender='$gender', patient_address='$address', patient_phonenumber='$phone', patient_insurance_id='$insurance', patient_email='$email',
				patient_password='$password' WHERE patient_id = '$userId' ";

		 // echo $sql;

if(mysqli_query($con,$sql))
	echo "success";
else
	echo "Failed";



?>