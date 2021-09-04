<?php
$html='<form class="" id="add" enctype="multipart/form-data" method="POST">
<div class="row">
<div class="form-group col-md-4"><label>Destination Code</label>
<input name="code" type="text" class="form-control" required placeholder="Only 2 Letter" onkeyup="test()" id="code"/>
</div><div class="form-group col-md-4"><label>Destination Name</label>
<input name="name" type="text" class="form-control" required placeholder="Destination Name"/>
</div><div class="form-group col-md-4"><label>Price</label>
<input name="price" type="number" class="form-control" required placeholder="Amount in INR"/>
</div></div><div class="row"><div class="form-group col-md-6">
<label>Image</label><input name="image" type="file" class="form-control" required />
</div><div class="form-group col-md-6"><label>Date</label>
<input type="date" class="form-control" required name="date"/>
</div></div><div class="form-group">
<label>Details</label><textarea name="details"  required class="form-control" placeholder="Deatils About Trip">
</textarea></div><div class="form-group"><label>Declaration</label>
<textarea name="declare" class="form-control" placeholder="Declaration About Trip" required></textarea></div>
<div>
</form> 
<button onclick="addest()"  class="btn btn-primary waves-effect waves-light" >Save</button>
	<div style="color:blue" id="msg1"></div>
	<script>
	function test()
	{
	  var code= $("#code").val();
	  //alert(code);
	  $.ajax({
	      url:"ajax/check",
	      data:{"code":code},
	      type:"POST",
	      success:function(data)
	      {
	        //alert(data);
	          $("#msg1").html(data);
	      }
	  });
	}
function addest(){
$.ajax({
		url:"ajax/add",
		data:new FormData($("#add")[0]),
		type:"POST",
		contentType:false,
		cache:false,
		processData:false,
		success:function(data)
		{
			$("#msg1").html(data);
		}
		
	});
	
}
</script>';
	echo $html;
?>
