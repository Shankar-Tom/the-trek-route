<?php
$page="Book";
if(!isset($_POST['dcode']))
{
	header('Location:home');
	die();
}
$code=$_POST['dcode'];
require ('inc/dbconnect.php');
$sql="SELECT * FROM `destination` WHERE dcode='$code'";
$result=mysqli_query($connect,$sql);
$bd=mysqli_fetch_assoc($result);
include('header.php');
?>
<div class="main-container">
            <section class="cover height-30 imagebg text-center" data-overlay="2" id="home">
                <div class="background-image-holder">
                    <img alt="background" src="img/book.jpg" />
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-8">
                            
                            <p class="lead">
                               Fill the form for <?php echo $bd['dname'];?>
                            </p>
                        </div>
                    
	
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
			</div>
		
           <div class="tab__content">
                            <section class="text-center bg--secondary">
                                <div class="container">
                                    <div class="row" >
                                        <div class="col-md-7 col-lg-8">
                                             
                                            <form name="book" action="checkout" method="post"  onsubmit="return validateForm()" id="book">
                                               <div id="add" class="row  ">
                                                <div class="col-md-3">
												<label> Name:</label>
													<input class="validate-required" type="text" name="name1" placeholder="Type Name Here" required />
													</div>
												<div class="col-md-3">
													<label>Email Address:</label>
													<input type="email" name="email1" placeholder="Email Address"  />
												</div>
												<div class="col-md-3">
													<label>Phone Number:</label>
													<input type="tel" name="phone1" placeholder="Mobile Number" required />
												</div>
												<div class="col-md-3">
													<label>Age</label>
													<input type="text" name="age1" placeholder="Age" required />
												</div>
												
												 <div class="col-md-6" style="display:none">
													
													<input type="text" name="people" value="1"  id="people"/>
												</div>
													<input type="hidden" name="code" value="<?php echo $code?>">
												 </div>
                                           <button type="submit" class="btn--sm btn--primary"  >Submit & Confirm</button>
										 
                                          </form>
										  </br>
										<button  class="btn--sm btn--primary"  onclick="addmore()" id="adbtn">Add </button></br>
                                         
                                        </div>
                                   </div>
                                    <!--end of row-->
                                </div>
                                <!--end of container-->
                            </section>
                        </div>
						<div class="modal-container" data-autoshow="500">
                <div class="modal-content">
                    <div class="boxed boxed--lg">
                        <h2>Details About The trip</h2>
                        <hr class="short">
                        <p class="lead">
                           <?php echo $bd['ddetails']; ?> 
                        </p>
                    </div>
                </div>
            </div>
   <?php include('footer.php'); ?>             
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168122803-1');
  function addmore(){
	  
	  var p=$('#people').val();
	  p++;
	if ( p < 5 ){
	  $('#add').append('<div class="col-md-3"><label> Name:</label><input class="validate-required" type="text" name="name'+p+'" placeholder="Type Name Here" required /></div><div class="col-md-3"><label>Email Address:</label><input type="email" name="email'+p+'" placeholder="Email Address" /></div><div class="col-md-3"><label>Phone Number:</label><input type="tel" name="phone'+p+'" placeholder="Mobile Number" required /></div><div class="col-md-3"><label>Age</label><input type="text" name="age'+p+'" placeholder="Age" required  /></div>');
	   $('#people').val(p);
	   if (p == 4)
	   {
		   $('#adbtn').hide();
		   $('#add').append('<p style="color:red">Only 4 people allowed at once.</p>'); 
	   }
	  }
	  
  }
</script>
	
	
	
    </body>
</html>