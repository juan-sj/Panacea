<?php

include("connection.php");

// $cid = $_REQUEST['cid'];
$alarm = $_REQUEST['alarm'];
$cid = '2';

$sql = " UPDATE pharmacy SET alarm= '$alarm' WHERE id = '1' ";  
if(mysqli_query($con,$sql))
{
echo "success";	
}
else{
echo "Failed";	
}


?>