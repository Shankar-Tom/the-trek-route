
function deldest(x)
{
	var id=x;
	if(confirm('Are you sure to delete ?'))
	{
		$.ajax({
			url:'ajax/deletedest',
			type:'post',
			data:{'id':id},
			success:function(data)
			{
				
				if(data==1)
				{
					$('#myLargeModalLabel').text('Destination Delete');
					$('#adddest').modal('show');
					location.reload();
				}
			}
		});
	}
}

function add()  
{$.ajax({
			url:'ajax/addform',
			success:function(data)
			{
				$('#modalBody').html(data);
				$('#myLargeModalLabel').text('Add Destination');
				$('#adddest').modal('show');
			}
	});
}
function view(e){
	var id=e;
	$.ajax({
			url:'ajax/view',
			type:'post',
			data:{'id':id},
			success:function(data)
			{
				$('#modalBody').html(data);
				$('#myLargeModalLabel').text('View Details');
				$('#adddest').modal('show');
			}
	});
}
function edit(e){
	var id=e;
	$.ajax({
			url:'ajax/editform',
			type:'post',
			data:{'id':id},
			success:function(data)
			{
				$('#modalBody').html(data);
				$('#myLargeModalLabel').text('Edit Details');
				$('#adddest').modal('show');
			}
	});
}
