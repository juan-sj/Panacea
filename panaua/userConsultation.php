<?php

include("connection.php");

$uid = $_REQUEST['uid'];

$sql = "SELECT * FROM consultation WHERE patient_id = '$uid' ";
// echo $sql;

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
	
		$selSql = "SELECT * FROM doctor WHERE id = '$row[doctor_id]' ";
		$selRes = mysqli_query($con,$selSql);
		$selRow = mysqli_fetch_assoc($selRes);
		$doc_name = $selRow['doctor_name']; 
		$doc_spec = $selRow['doctor_specialized'];


		$consul_date = date("d-m-Y", strtotime($row['date']));

		$data['data'][] = array('id' => $row['id'], 'consul_details' => $row['consultation_details'], 'consul_date' => $consul_date, 'doc_name' => $doc_name, 'doc_spec' => $doc_spec  );
	}
	echo json_encode($data);
}
else{
echo "Failed";	
}


?>