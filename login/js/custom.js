$(function(){ Login.init(); });
		function login(){
			//alert(1);
			$.ajax({
				url:'login1.php',
				data:new FormData($('#form-login')[0]),
				type:'post',
				cache: false,
				processData: false,
				contentType: false,
				success:function(data)
				{
				    //alert(data);
					if(data==1){
						$('#msg').text('Login Successful');
						window.location.href='https://thetrekroute.com/admin/dashboard';
					}
					else
					{
						$('#msg').text('Please enter correct crendentials');
					}
				}
				
			});
			
		}