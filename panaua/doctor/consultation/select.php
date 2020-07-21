<?php
include("table.php");
include("../header_inner.php");

$del_id=0;
$i=0;
?>


		<link rel="stylesheet" type="text/css" href="datatables.min.css">
 
		<script type="text/javascript" src="datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>

<style>
.hiddentd
{
display:inline-block;
    width:180px;
    white-space: nowrap;
    overflow:hidden !important;
   
}
</style>


<div class="">
<?php

	echo "<div class='col-sm-2' style='float:right;margin-bottom:10px;'><form action='form.php' method='post'><input type='submit' name='view' value='Add New' class='form-control btn-danger'></form></div>";
	
?>
<div class="clearfix"></div>
<table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0"  role="grid" aria-describedby="example_info" >
            
          <?php
	
		  include("../connection.php");
	
	
if(isset($_REQUEST['del_id']))
{
$del_id=$_REQUEST['del_id'];
mysqli_query($con,"delete from $table where id='$del_id'");
//if($del_id!="")
}
	?>
    <script>


function rem()
{
if(confirm('Are you sure you want to delete this record?')){
return true;
}
else
{
return false;
}
}


function rem2()
{
if(confirm('Are you sure you want to deactive this record?')){
return true;
}
else
{
return false;
}
}
</script>
    
	
	<?php


		  $result2 = mysqli_query($con,"SHOW FIELDS FROM $table");

 echo "<thead><tr>";

while ($row2 = mysqli_fetch_array($result2))
{

 if($row2['Field'] != 'doctor_id')
 {
  	$name=$row2['Field'];
  	if($name == 'patient_id')
  		$name = 'patient';
    echo "<th>".
  	str_replace('_', ' ', $name)
  ."</th>";
 $i++;
 }
}
 echo "
<th>Prescribe</th>
 
</tr></thead>";
   
  // $i=0;
   echo "<tbody>";
   
   		$date = date("Y-m-d");
	 	$result = mysqli_query($con,"SELECT id,patient_id,consultation_details,date  FROM $table WHERE doctor_id='$_SESSION[doctor_id]' AND date='$date'");
	 	// echo "SELECT id,patient_id,consultation_details,date  FROM $table WHERE doctor_id='$_SESSION[doctor_id]' AND date='$date'";

		while($row = mysqli_fetch_array($result))
		{

		$id=$row['0'];
		echo "<tr>";
		for($k=0;$k<$i;$k++)
		{
			
			if($k==100)
			{
			  $sql2 = "select *  from doctor where id='$row[doctor_id]' ";
    		  $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));
			  $row2 =mysqli_fetch_array($result2);
		
			   echo "<td >  $row2[doctor_name]</td>";
				
			}
			
			elseif($k==1)
			{
			  $sql2 = "select *  from patient where patient_id='$row[patient_id]' ";
    		  $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));	
			  $row2 =mysqli_fetch_array($result2);
		
				echo "<td >  $row2[patient_name]</td>";
				
			}
			
		
			else
			{
			echo "<td >$row[$k]</td>";
			}
			
		}
		
	 	
			echo "
			
			<td><a href='../pharmacy/form.php?cid=$id'>Prescribe</a></td>
	 		
	 		</tr>";
		
		}
        
        ?>
        </tbody>
    </table>

<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>

<div class="clearfix"></div>
	
    </div> 
    <?php
	
//	include("../footer_inner.php");
	?>