<?php
require_once('dbconnect.php');

function sum($field,$table)
{
	global $connect;
	$sql="SELECT sum($field) AS res FROM $table";
	$sum=mysqli_query($connect,$sql);
	$amn=mysqli_fetch_assoc($sum);
	return $amn['res'];
}
function coun($field,$table)
{
	global $connect;
	$count="SELECT COUNT($field) as cou FROM $table";
	$coures=mysqli_query($connect,$count);
	$couarr=mysqli_fetch_assoc($coures);
	return $couarr['cou'];
	
}
function sumWithCond($field,$table,$cond,$data)
{
	global $connect;
	$sql="SELECT sum($field) AS res FROM $table WHERE $cond='$data'";
	$sum=mysqli_query($connect,$sql);
	$amn=mysqli_fetch_assoc($sum);
	return $amn['res'];
}
function counWithStand($field,$table,$cond,$data)
{
	global $connect;
	$count="SELECT COUNT($field) as cou FROM $table  WHERE $cond='$data'";
	$coures=mysqli_query($connect,$count);
	$couarr=mysqli_fetch_assoc($coures);
	return $couarr['cou'];
}

function getMultipleRecord($table)
	{
		global $connect;
		$sql = "SELECT * FROM $table ";
		$query = mysqli_query($connect,$sql);
		//echo $sql;exit();
		$result = array();
		while($res = mysqli_fetch_assoc($query)) 
		{  
			$result[] = $res;
			//echo $result['name'];exit;
		}
	  return $result;
	}
function getMultipleRecordAll()
{
	global $connect;
		$sql = "SELECT payment_details.*,people_details.* FROM payment_details 
		JOIN people_details ON payment_details.booking_id=people_details.booking_id ";
		$query = mysqli_query($connect,$sql);
		//echo $sql;exit();
		$result = array();
		while($res = mysqli_fetch_assoc($query)) 
		{  
			$result[] = $res;
			//echo $result['name'];exit;
		}
	  return $result;
}	

?>