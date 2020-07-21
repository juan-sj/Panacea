
<?php
//include("header.php");
set_time_limit(0);
error_reporting(0);
$diseases[]=0;
$diseases_count=0;
$ii=0;

//mysql_connect("localhost", "root", "") or die(mysql_error());
//mysql_select_db("chat3") or die(mysql_error());
//
//$result = mysql_query("SELECT * FROM msg where reply='smallest_wt_symptom' ") 
//or die(mysql_error());  
//
//
//while($row = mysql_fetch_array( $result )) {
//$smallest_wt_symptom=$row['msg'];
//
//}
//
//$result = mysql_query("SELECT * FROM msg where reply='symptom' ") 
//or die(mysql_error());  
//
//
//while($row = mysql_fetch_array( $result )) {
//$symptoms=$row['msg'];
//
//}


$smallest_wt_symptom=$symptom1;
$symptoms=$symptoms;
$symm=str_replace("
","**",$symptoms);
//echo $symptoms;
?>




























<?php
// Provides: <body text='black'>

$stringData ="var dataString =\"<chart caption='Diseases' formatNumberScale='0'>\\n";


//echo "small".$smallest_wt_symptom;
$con=mysql_connect('localhost','root','');
mysql_select_db('diseases_evaluation',$con) or die(mysql_error());




$final_word_all=$symptom11;









 
 
 
 
$query = "SELECT * FROM symptoms where symptom='$smallest_wt_symptom'" ;
$result = mysql_query($query)or die("error".mysql_error());
while($row=mysql_fetch_array($result))
{

$diseases=$row['disease'];

}



$str=$diseases;
//echo "Disease".$str."<br>";

$arr = explode(",", $str);
for($i = 0; $i < count($arr); $i++)
{
	$arr[$i]=trim($arr[$i]);
	$val=$arr[$i];
	
	
$arr1 = explode("
", $symptoms);
$scount=count($arr1);
$bench_mark=count($arr1)/2;

for($i1 = 0; $i1 < count($arr1); $i1++)
{
	$arr1[$i1]=trim($arr1[$i1]);
	$val1=$arr1[$i1];
	
	$val=addslashes($val);
	$val1=addslashes($val1);
	$syss=$syss."-".$val1."***";
	
	$sql1 = "SELECT distinct(diseases),count(*) as tot FROM diseases_new where diseases='$val' and symptoms like '%$val1%'" ;
$query1 = mysql_query($sql1) or die("error".mysql_error());

while($roww=mysql_fetch_array($query1))
 {





if($diseases_namee!=$val)
{
//	echo "<table border='1'><tr><td>".$val."</td></tr><tr><td>";
}


	//echo $val1."-".$roww['tot']."";


$diseases_namee=$val;



if($roww['tot']>=1)
{
	$match=$match+1;
}
}

	
}
$diseases_name[$ii]=$val;
$diseases_array[$ii]=$match;
$ii++;
$val=stripslashes($val);
$val = str_replace("'", " ", $val);

	//echo "<i>Match : $match </i></td></tr></table>";
	$match=0;
	
}















for($hh=0;$hh<count($arr);$hh++)
{
mysql_query("INSERT INTO order_rate (symptom,count)VALUES('$diseases_name[$hh]','$diseases_array[$hh]')") or die("error".mysql_error());
$wt=0;

}

?>
    
<?php

	
	
	
	$sql11 = "SELECT distinct(symptom),symptom,count,symptoms FROM order_rate join diseases_new on diseases=symptom order by count desc limit 0,20" ;
	
	
	$sql11 = "SELECT distinct(symptom),symptom,count,symptoms,diseases_new.id as id FROM order_rate join diseases_new on diseases=symptom where count='$scount'" ;
	
	
	
$query11 = mysql_query($sql11) or die("error".mysql_error());

while($roww1=mysql_fetch_array($query11))
 {

	$symtoms1=$roww1['symptom'];
	$count11=$roww1['count'];
	$val=$roww1['symptoms'];
//if($count11>$bench_mark)
//{
//echo "<a href='' title='$val'>$symtoms1 ( $count11 )</a><br> $val <br>" ;
//echo $_REQUEST[symptoms];
//$syss=$symptoms;
//echo $syss;

echo "<a href='?ref_id=$_REQUEST[ref_id]&dieases=$roww1[id]&symptoms=$symm&spl=$spl' title='$val'>$symtoms1 ( $count11 ) $roww1[id] </a><br>" ;
$syss="";
}

mysql_query("TRUNCATE TABLE order_rate") or die("error".mysql_error());
 
?>

    
   

