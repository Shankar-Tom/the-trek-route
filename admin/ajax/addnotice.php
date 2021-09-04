<?php
session_start();

require('../../inc/dbconnect.php');
$type=$_POST['type'];
$notice=$_POST['notice'];
$sql="INSERT INTO notice (`type`,`notice`) VALUES ('$type','$notice')";
if(mysqli_query($connect,$sql))
{
	echo 'Notice Added ';
}
?>