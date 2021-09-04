<?php
$response='';
require('../../inc/dbconnect.php');
if(isset($_POST['id']))
{
 $id=$_POST['id'];
 $sql="SELECT * FROM destination WHERE id='$id'";
 $result=mysqli_query($connect,$sql);
 $arr=mysqli_fetch_assoc($result);
 $image=$arr['image'];
 $imd='destination/'.$image;
 //echo $imd;exit();
 if(unlink($imd))
 {
 $del="DELETE from destination WHERE id='$id'";
 $result=mysqli_query($connect,$del);
 if($result)
 {
	 $response=1;
 }
 }
echo $response;
}
?>