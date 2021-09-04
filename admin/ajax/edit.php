<?php
require('../../inc/dbconnect.php');
$id=$_POST['id'];
$price=$_POST['price'];
$date=$_POST['date'];
$sql="UPDATE destination SET price='$price',tdate='$date' WHERE id='$id'";
if(mysqli_query($connect,$sql))
{
	echo 'Updated';
}
?>