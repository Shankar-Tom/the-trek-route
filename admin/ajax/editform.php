<?php
$response='';
require('../../inc/dbconnect.php');
if(isset($_POST['id']))
{
 $id=$_POST['id'];
 
 $sql="SELECT * from destination WHERE id='$id'";
 $result=mysqli_query($connect,$sql);
 
 if($result)
 {
	$data=mysqli_fetch_array($result);
	$response.='<form class="" id="edit">
	<center><img src="../destination/'.$data['image'].'"  height="100px" width="100px"></center>
	<div class="row">
	<div class="form-group col-md-6"><label>Price in Rupees</label><input name="price" type="text" class="form-control" required value="'.$data['price'].'"/></div>
	<div class="form-group col-md-6"><label>Date</label><input type="date" name="date" class="form-control" required value="'.$data['tdate'].'"/></div>
	</div>
	<input type="hidden" name="id" value="'.$id.'">
	</form> 
	<div>
	<button onclick="editsave()"  class="btn btn-primary waves-effect waves-light">Submit</button>
	<div id="alert"></div>';
 }
 
echo $response;
}
?>
<script>
function editsave(){
	$.ajax({
		url:'ajax/edit',
		data: new FormData($('#edit')[0]),
		type:'POST',
		contentType:false,
		processData:false,
		cache:false,
		success:function(data)
		{
			$('#alert').html(data);
			location.reload();
		}
		
	});
}
</script>