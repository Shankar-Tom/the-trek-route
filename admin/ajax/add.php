<?php
require('../dbconnect.php');
$dcode=$_POST['code'];
$query="SELECT * FROM destination WHERE dcode='$dcode'";
$result=mysqli_query($connect,$query);
if(mysqli_num_rows($result)>0){ echo "Destination code not available."; }
else{
$dir='destination/';
$allowTypes = array('image/jpeg', 'image/jpg', 'image/png');
$ftype=$_FILES['image']['type'];
if(in_array($ftype, $allowTypes))
{
$fname=$_FILES['image']['tmp_name'];
$foname=$_FILES['image']['name'];
$ffoname=$dcode.'-'.$foname;
$dname=$_POST['name'];$ddate=$_POST['date'];$price=$_POST['price'];
$details=$_POST['details'];$declare=$_POST['declare'];
if(move_uploaded_file($fname,$dir.$ffoname))
{
$sql="INSERT INTO destination (`dname`,`dcode`,`tdate`,`image`,`ddeclare`,`ddetails`,`price`)
 VALUES ('$dname','$dcode','$ddate','$ffoname','$declare','$details','$price')";
 if(mysqli_query($connect,$sql))
 {
	 echo 'Success';exit();
 }
}	
}
echo 'File is not an image.';exit();
}
?>