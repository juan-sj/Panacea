<?php

include("connection.php");

$name = $_POST['name'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$insurance = $_POST['insurance'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = " INSERT INTO patient ( patient_name, patient_gender, patient_address, patient_phonenumber, patient_insurance_id, patient_email, patient_password ) VALUES 
						     ( '$name',	     '$gender',		 '$address',	  '$phone',	   	 	   '$insurance',	     '$email', 		'$password') ";

if(mysqli_query($con,$sql))
	echo "success";
else
	echo "Failed";



?>