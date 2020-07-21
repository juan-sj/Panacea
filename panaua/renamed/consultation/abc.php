<?php

include("../connection.php");
if($_REQUEST['medd']!="")
{
	//echo "Inserted ...........";
mysqli_query($con,"insert into consultation (patient_id,consultation_details,doctor_id) value ('$_REQUEST[ref]','$_REQUEST[symptoms]','$_SESSION[doctor_id]')");
$iid=mysqli_insert_id($con);
header("location:../pharmacy/form.php?cid=$iid&pid=$_REQUEST[ref]");
//echo "<script>window.location.href('location:../pharmacy/form.php?cid=$iid');</script>";
}
?>