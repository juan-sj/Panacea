 	<?php

include("connection.php");

$uid = $_REQUEST['uid'];

/*$consql = "SELECT * FROM consultation WHERE id = '$cid' ";
$conres = mysqli_query($con,$consql);
$conrow = mysqli_fetch_assoc($conres);*/

$consul_date = "";

$sql = "SELECT * FROM pharmacy WHERE patient_id = '$uid' ";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
	
		$data['data'][] = array('id' => $row['id'],
							    'medicine_details' => $row['medicine_details'],
							    'time1' => $row['time1'],
							    'time2' => $row['time2'], 
							    'time3' => $row['time3'], 
							    'medicine_dose' => $row['medicine_dose'], 
							    'medicine_quantity' => $row['medicine_quantity'],
							    'medicine_days' => $row['medicine_days'], 
							    'consul_date' => $consul_date );
		// $data['data'][] = $row;
	}
	echo json_encode($data);
}
else{
echo "No Medication";	
}


?>