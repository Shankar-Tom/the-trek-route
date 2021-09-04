<?php
$response='';
$dir='../../destination/';
require('../../inc/dbconnect.php');
if(isset($_POST['id']))
{
 $id=$_POST['id'];
 
 $sql="SELECT * from destination WHERE id='$id'";
 $result=mysqli_query($connect,$sql);
 
 if($result)
 {
	$data=mysqli_fetch_array($result);
	$response.='<center><img src="../destination/'.$data['image'].'" height="150px" width="150px"></center>
	<div class="row">
	<div class="form-group col-md-3"><label>Destination Code</label><input type="text" class="form-control " value="'.$data['dcode'].'"  readonly /></div>
	<div class="form-group col-md-3"><label>Destination Name</label><input type="text" class="form-control" value="'.$data['dname'].'" readonly /></div>
	<div class="form-group col-md-3"><label>Price</label><input type="text" class="form-control " value="'.$data['price'].'" readonly /></div>
	<div class="form-group col-md-3"><label>Date</label><input type="text" class="form-control" value="'.$data['tdate'].'" readonly /></div>
	</div>
	<div class="form-group"><label>Details</label><div>'.$data['ddetails'].'</div></div>
	<div class="form-group"><label>Declaration</label><div>'.$data['ddeclare'].'</div></div>';
 }
 
echo $response;exit();
}
?>