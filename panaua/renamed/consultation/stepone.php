<?php
//include("header.php");
error_reporting(0);
set_time_limit(0);
$diseases[]=0;
$diseases_count=0;

?>

</head>







<br /><br />
<textarea name="symptoms" placeholder="Use enter key to seperate symptoms" style="width:400px;height:100px;"><?php echo $_REQUEST['symptoms']; ?></textarea>
<br /><br />
<center>
<input name="" value="Enter Symptoms & Submit" type="submit" class='btn btn-primary'>
</center>
<br>

</form>







<?php
// Provides: <body text='black'>
$value_grammer=$_REQUEST['val'];
echo $value_grammer;
$symptoms=$_POST['symptoms'];


$word=$symptoms;

//$word="lovely filter fishing";
$arr = explode("
", $word);
//include('stepone_stem.php');

$con=mysql_connect('localhost','root','');
mysql_select_db('diseases_evaluation',$con) or die(mysql_error());

//mysql_connect("localhost", "root", "") or die(mysql_error());
//mysql_select_db("chat3") or die(mysql_error());
//	
//$test="feverff\nvomiting\nheadache\ncold";
//mysql_query("INSERT INTO msg(msg,reply) VALUES('$test','symptom' ) ") 
//or die(mysql_error()); 



$len=strlen($symptoms);
if($symptoms!="" && $len>2)
{

$final_word_all=$symptoms;











 
 
 
 




$str=$final_word_all;




$arr = explode("
", $str);




for($i = 0; $i < count($arr); $i++)
{
	$arr[$i]=trim($arr[$i]);
	//echo $arr[$i]."<br>";
	
		$val=$arr[$i];
		
	$sql = "SELECT * FROM symptoms where symptom='$val'" or die("error select".mysql_error());
$query = mysql_query($sql);

if(mysql_num_rows($query) > 0)
 {

//echo "$val - Already Exist<br>";
$diseases_group.=$val." ";
$result = mysql_query("update symptoms set status='1' where symptom='$val'")or die("error update".mysql_error());

}

else
{
symptoms($val);
$result = mysql_query("update symptoms set status='1' where symptom='$val'")or die("error update2".mysql_error());
}
	
	
	
	
	
	
	
	
	
	


}






//echo "<br>".$diseases_group;









$arr = explode(" ", $diseases_group);




for($i = 0; $i < count($arr); $i++)
{
	$arr[$i]=trim($arr[$i]);
	//echo $arr[$i]."<br>";
	
		$val=$arr[$i];
	$sql = "SELECT * FROM symptoms where symptom='$val'" or die("error".mysql_error());
$query = mysql_query($sql);

if(mysql_num_rows($query) > 0)
 {

//echo "$val - Already Exist";
$diseases_group.=$val." ";

}

	
	
	
	
	
	
	
	
	
	


}



}



mysql_query("delete from symptoms where weight='0'");



$query = "SELECT * FROM symptoms where status='1' and weight!='0' order by weight asc limit 0,1" ;
$result = mysql_query($query)or die("error".mysql_error());
while($row=mysql_fetch_array($result))
{
$min_wt=$row['weight'];
$symptom1=$row['symptom'];
}
//echo "<br>Min Wts:$min_wt, Symptom $symptom1 ";

$result = mysql_query("update symptoms set status='0'")or die("error update3".mysql_error());









function symptoms($val)
{
$str=$val;


$result = mysql_query("SELECT COUNT(*),diseases FROM diseases_new");  
//echo "<table border='1'><tr><td>Diseases</td>";
while($row=mysql_fetch_array($result))  
{  
$diseases_no=$row['COUNT(*)']; 
$diseases=$row['diseases'];
//echo "Total Count : $diseases_no<br>";

$total_disease=$diseases_no;
}  
$result = mysql_query("SELECT * FROM diseases_new");  
while($row=mysql_fetch_array($result))  
{  

$id=$row['id'];
$diseases=$row['diseases'];
//echo "<td><a href='' title='$diseases'>$id</a></td>";
} 



//echo "<td>Count</td><td>Wt</td></tr>";

$word_count_i=0;
$rr=0;
$arr = explode("
", $str);




for($i = 0; $i < count($arr); $i++)
{
	$arr[$i]=trim($arr[$i]);
	
	
	if($arr[$i]!="" && $arr[$i]!=NULL && $arr[$i]!=" " && $arr[$i]!="  " && $arr[$i]!="    " )
{
//echo $arr[$i]."<br>" ;

//echo "<tr><td>".$arr[$i]."</td>";
$diseas_name=$arr[$i];
$words_store[$word_count_i]=$arr[$i];
$word_count_i++;
$query=mysql_query("select * from diseases_new") or die(mysql_error());

 while($row=mysql_fetch_assoc($query))
{ 
	$doc=$row['symptoms'];
	$dis=$row['diseases'];
	
$diseases_name[$rr]=$dis;
	$rr++;
	
	
$string = $doc;

$count_some = str_incounter($arr[$i],$string);

// will return 3
//echo "<td><a href='' title='$dis'>".$count_some."</a></td>" ;
	
	if($count_some!=0)
	{
	
		$diseases_lists=$diseases_lists.",".$dis;
		$doc_present++;
		//echo $diseases_lists."<br>";
	}
	$row_value=$row_value.$count_some.",";
	
	if($j!=2)
{
	
$diseases_array[$diseases_count]=0;
	
}
	
	else
	{
		$diseases_array[$diseases_count]=$diseases_array[$diseases_count]+1;
		$j=2;
	}
	
	
		$diseases_count++;
	
}





$j=0;	
$diseases_count=0;
mysql_query("delete from symptoms where weight='0'");
$wt2=$doc_present/$total_disease;
//echo "ddddddd".$diseases_lists;
//echo "<td>".$doc_present."</td><td>$diseas_name $wt2</td>";
$diseas_name=addslashes($diseas_name);
$diseases_lists=addslashes($diseases_lists);
mysql_query("INSERT INTO symptoms (symptom,weight,disease)VALUES('$diseas_name','$wt2','$diseases_lists')") or die("error insert".mysql_error());


	
$wt=0;
//echo "</tr>";
$wt=" ";
$wt2=0;
if($doc_present>=$doc_avg)
{
	
$filter_words=	$filter_words." ".$arr[$i];
}
$row_value = substr($row_value, 0, -1); 
//echo "<br />Piece $i = $arr[$i] ";
$rrow_value=$rrow_value."[".$row_value."],";
$row_value=" ";
$doc_present=0;
}


}

//echo "<tr><td></td>";


//echo "</tr>";
//echo "</table>";
$diseases_group.=$diseas_name." ";

//echo "Value added";



}


function str_incounter($match,$string) 
{
$count_match = 0;
for($i=0;$i<strlen($string);$i++) 
{
if(strtolower(substr($string,$i,strlen($match)))==strtolower($match)) 
{
$count_match++;
}
}
return $count_match;
}

if($symptoms!="" && $len>2 && $min_wt!=0)
{

//echo "<br>Minimum Weight:".round($min_wt,4).", Symptom:$symptom1 ";
//echo "<br>".$symptoms;
}
if($symptoms!="" && $min_wt==0)
{
	echo "Symptom is not present <br>";
}
if($symptoms!="" && $len<=2)
{
echo "Please Enter The correct symptom";	
}




if($symptoms!="" && $len>2 && $min_wt!=0)
{
	$url="steptwo.php?smallest_wt_symptom=$symptom1&symptom=$symptoms";
	
	

	//echo "<a href='$url'>".$url."</a>";
?>

    
 
    
  <?php  
}
?>


<?php

include("steptwo.php");

?>
