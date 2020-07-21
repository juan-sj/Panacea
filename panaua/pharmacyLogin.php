<?php

include("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM staff WHERE staff_email = '$username' && staff_password = '$password' && staff_type='pharmacy' ";

// echo "$sql";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0)
{
/*	while($row = mysqli_fetch_assoc($result))
	{
		$data['data'][] = $row;
	}
	echo json_encode($data);
*/
	echo "Success";
}
else{
echo "Failed";	
}


?>