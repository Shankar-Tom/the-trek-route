<?php
$page='Home';
include('header.php');
require ('inc/dbconnect.php');
$sql="SELECT * FROM `destination`";
$sql2="SELECT * FROM `notice`";
$result=mysqli_query($connect,$sql);
$result2=mysqli_query($connect,$sql2);
$ncount=mysqli_num_rows($result2);
?>
	<class="main-container">
            <section class="text-center imagebg space--xsm" data-overlay="3">
                <div class="background-image-holder">
                    <img alt="background" src="img/trek2.jpeg" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-6">
                            <h1>We Plan For You</h1>
                            <h3></h3>
                            
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
			<section class="text-center cta cta-4 space--xxs border--bottom " >
                <div class="container">
			<?php 
		foreach($result2 as $notice )
		{
		    $notices[]=$notice;
		}
	
		?>
		  
                    <div class="row" >
                        <div class="col-md-12"><span class="label label--inline" class="notice_type" ></span>
                            <span id="notice"></span> 
                            </div>
                    </div>
                    <!--end of row-->
     
			</div>
                <!--end of container-->
            </section>
			<section class="bg--secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-block">
                                <h3>Destinations Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="slider" data-paging="true">
                        <ul class="slides">
						<?php
						if (mysqli_num_rows($result) > 0) {
						while($dd = mysqli_fetch_array($result)) 
						{
                           echo' <li class="col-md-4 col-12">
                                <div class="feature feature-1">
                                    <a href="#" class="border-round block">
                                        <img alt="Image" src="admin/ajax/destination/'.$dd['image'].'" height="250px" width="350px" />
                                    </a>
                                    <div class="feature__body boxed boxed--border">
                                        <h5>'.$dd['dname'].'</h5>
                                        <p>
                                           Price - '.$dd['price'].'
										  
                                        </p>
										<p>
                                           Date -'.$dd['tdate'].'
										</p>
									<form method="post" action="book" >
								<input type="hidden" value="'.$dd['dcode'].'" name="dcode">
								<button class="btn btn--sm btn--primary type--uppercase"  type="submit" >Book Now</button>
								</form>
									</div>
                                </div>
                                <!--end feature-->
								
							</li>';
							}
						}
						else
						{
							echo '<h3>No Destinations Available Now</h3>';
						}
							?>
                        </ul>
                    </div>
                    <!--end slider-->
                </div>
                <!--end of container-->
            </section>
		
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168122803-1');
   var i=1;
</script>
<style>
    
    .notice_type::before
    {
        content:"<?= $notice['type']?>"";
        
        
    }
    
    
    
</style>
	 <?php include('footer.php'); ?>  
   