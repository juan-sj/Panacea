<?php
//session_start();
include("../header_inner.php");
include("table.php");

$k=0;
?><!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>
<style>
.reddd
{
color:#F00;	
}
.green
{
color:#F0F;	
}
</style>
<!--<style>
div
{
text-transform:capitalize;
margin-bottom:5px;	
}

</style>-->
<?php

include("data_validation.php");
include("../connection.php");



$g=0;

$result = mysqli_query($con,"SHOW FIELDS FROM $table");

$i = 0;

echo "";
echo "<table width='800' border=0><tr><td width='500' valign='top'>";
echo "<h2>$title</h2>";


echo "<form action='abc.php' method='post' enctype='multipart/form-data' name='register_form' id='register_form'>";


?>

Patient Regno : <input type="text" class="form-control" name="ref" value="<?php echo $_REQUEST['ref_id']; ?> "  style="width:400px;">
<?php
if($_REQUEST['symptomss']=="")
{
?>
<br><br>



<br /><br />
<textarea name="symptoms" placeholder="Use enter key to seperate symptoms" style="width:400px;height:100px;"><?php echo $_REQUEST['symptoms']; ?></textarea>




<br /><br />
<center>
<input name="medd" value="Enter Symptoms & Submit" type="submit" class='btn btn-primary'>
</center>
<br>

</form>

















<?php



//echo "</form>";

foreach($_POST['spl'] as $item)
{
	//echo "sssssss";
  $spl=$spl.$item."*";
}
//echo "kkkkkkk".$spl;

//include("stepone.php");
}
include("../connection.php");








		
		
		
		
		
		
		
		
		
		
		
		
		
		
	  $flag=1;


echo "</td><td valign='top'>
";
include("../connection.php");

 $result = mysqli_query($con,"SELECT * FROM patient WHERE patient_regno='$_REQUEST[ref_id]'") or die('Could not connect: ' . mysqli_error($con));

while($row = mysqli_fetch_array($result))
  {
	  echo "
	  <b>
	  Patient Name : $row[patient_name] <br>
	   DOB : $row[patient_dob] <br>
	   Mobile :  $row[patient_phonenumber]
	   </b>
	    <br><br>";
	  $flag=1;
  }
  
  $result = mysqli_query($con,"SELECT * FROM consultation WHERE patient_id='$_REQUEST[ref_id]' order by id desc") or die('Could not connect: ' . mysqli_error($con));

while($row = mysqli_fetch_array($result))
  {
	  echo " 
	  <h6>Consultation Details  ( $row[date] ) </h6>
	  Consultation Details :: $row[consultation_details]
	   
	  <input name='ref_id' type='hidden' value='$_REQUEST[ref_id]'>
	  
	 
	  </form> <hr>";
	  $flag=1;
  }


echo "

</td></tr></table>



<div class='clearfix'></div>


";






mysqli_close($con);

include("../footer_inner.php");

?>
   <div id="sample">
 <!-- <script type="text/javascript" src="nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>-->