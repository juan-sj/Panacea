<?php
include("../common/menu.php");
	error_reporting(0);
?>

  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
<!DOCTYPE html>
<html>
<head>
<title>Font Awesome Icons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<br>
    <style>
#right
{
	
float:right;	
color:#222;
font-size:12px;
}
</style>

<style>
#right
{
	
float:right;	
color:#333;
font-size:12px;
}
.userd
{
color:#333;	
}
.red
{
background:#FFECF4;
padding:10px;	
}


#right
{
	
float:right;	
color:#333;
font-size:12px;
}
.userd
{
color:#333;	
}
.red
{
background:#F36;
padding:10px;	
}
.table
{
margin-bottom:10px;
background:#E6F4FF;	
}
.sep
{
height:30px;
background:#666;	
}
</style>
       


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                                             
                            </div>
                            <div class="content all-icons">
                                <div class="row">
                                
                                
                               <?php
							   if($_SESSION['user']=="admin")
							   {
							   ?>
                                 
								
                                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../department/form.php">    <div class="font-icon-detail"><i class="pe-7s-id"></i>
                                      <input type="text" value="Department">
                                    </div></a>
                                  </div>
                                  
                                  
                                 <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../doctor/form.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="Doctor">
                                    </div></a>
                                  </div>
                                  
                                    
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../staff/form.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="Staff">
                                    </div></a>
                                  </div>
                                  
                                  
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../patient/form.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="Patient">
                                    </div></a>
                                  </div>
                                  
                             
                                 
                                  
                                <?php
							   }
								?>  
                              
                              
                              
                                  <?php
							   if($_SESSION['user']=="doctor")
							   {
							   ?>
                                
                                
                                  
                                  
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../patient/form.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="Patient">
                                    </div></a>
                                  </div>
                                  
                             
                                  
								    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../consultation/select.php">    <div class="font-icon-detail"><i class="pe-7s-note2"></i>
                                      <input type="text" value="Consultation">
                                    </div></a>
                                  </div>
                                  
                                  
                                <?php
							   }
								?>  
                                
                                   
							
                                
                                
                                  
                                
                                
                                
                                
                                
                                
                                
                              
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../pharmacy/form.php">    <div class="font-icon-detail"><i class="pe-7s-note2"></i>
                                      <input type="text" value="Pharmacy">
                                    </div></a>
                                  </div>
                                
                                
                                 <!-- 
                                 <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../booking/select.php">    <div class="font-icon-detail"><i class="pe-7s-note2"></i>
                                      <input type="text" value="Booking">
                                    </div></a>
                                  </div>
                               
                              -->
                              
                              
                              
                              
                            <div class="clearfix"></div>  
                              
                              
                              
                              <?php

	if($_SESSION['user']=="doctor")
								{
include("../connection.php");
 $result = mysqli_query($con,"SELECT * FROM patient WHERE patient_regno='$_POST[aadhar]'") or die('Could not connect: ' . mysqli_error($con));

while($row = mysqli_fetch_array($result))
  {
	  echo "<table width='800'><tr><td valign='top'>
	  
	  Patient Name : $row[patient_name] <br>
	   DOB : $row[patent_dob] <br>
	   Mobile :  $row[patient_phonenumber] <a href='../consultation/form.php?ref_id=$_POST[aadhar]'>
	  <br> Click For Consultation</a></td><td>";
	  $flag=1;
  }
  
  /*$result = mysqli_query($con,"SELECT * FROM consultation WHERE reference_no='$_POST[aadhar]'") or die('Could not connect: ' . mysqli_error($con));

while($row = mysqli_fetch_array($result))
  {
	  echo " 
	  <h6>Consultation Details </h6>Consultation Details :: $row[consultation_details] <br> Medicine :: $row[medicine]
	  
	  
	  ";
	  $flag=1;
  }*/
  if($flag==1)
  {
	echo "</td></tr></table> "; 
  }

if($flag!=1)
{
	?>
    <div class="col-sm-4">



    <form action="" method="post">


<input type="text"  name="aadhar" class="form-control" placeholder="Enter Reference Id"/>
</div><div class="col-sm-3">
<input type="submit"  name="search" value="search" class="btn btn-primary" />

</form>
</div><div class="col-sm-4">
    <form action="../patient/form.php" method="post">



<input type="submit"  name="Add New Patient" value="Add New Patient" class="btn btn-primary"/>

</form>
</div>
    <?php
}
else
{
?>


<?php	
}

								}
?>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                                
                                 
                                  
                                  
                          
                                </div>


                            </div>
                        </div>
                    </div>

                </div>



                
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                   
                </nav>
                <p class="copyright pull-right">
                   
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

	

</html>
