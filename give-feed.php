<?php
$page="Give Feedback";
include('header.php');
require ('inc/dbconnect.php');
$msg= "";
if(isset($_POST['b_id'])){
	$bid=$_POST['b_id'];
	$name=$_POST['name'];
	$query="SELECT * FROM people_details WHERE `booking_id`='$bid' AND `name`='$name'";
	$result=mysqli_query($connect,$query);
	if(mysqli_num_rows($result)>0)
	{
		$bkr=mysqli_fetch_array($result);
		$bkid=$bkr['phone'];
		$cfb="SELECT id FROM feedbacks WHERE booking_id='$bkid' AND `name`='$name'";
		$ckfbr=mysqli_query($connect,$cfb);
		if(mysqli_num_rows($ckfbr)>0)
		{
			$msg= '<span style="color:red">Feedback already submitted.</span>';
		}
		else {
		$feedback=$_POST['feedback'];
		$sql="SELECT * FROM payment_details";
		$ff=mysqli_query($connect,$sql);
		$feed=mysqli_fetch_assoc($ff);
		$feedfor=$feed['trip_name'];
		$insert="INSERT INTO feedbacks (`booking_id`,`feedback`,`name`,`feed_for`) VALUES ('$bkid','$feedback','$name','$feedfor')";
		if(mysqli_query($connect,$insert))
		{
		$msg= '<span style="color:green">Thank you for your valuable feedback.</span>';
		}
		}		
	}
	else
	{
		$msg= '<span style="color:red">No booking found .</span>';
	}
}
?>
            <!--end bar-->
</div>
        <div class="main-container">
            <section class="cover height-30 imagebg text-center" data-overlay="2" id="home">
                <div class="background-image-holder">
                    <img alt="background" src="../img/book.jpg" />
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>Share  Experience</h1>
                            <p class="lead">
                               
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
                                    <div class="row">
                                        <div class="col-md-7 col-lg-8">
                                             <span class="h4 inline-block">Write Your Experience With Us</span>
                                            <form name="book" method="post" class="row  " onsubmit="return validateForm()" >
                                                <div class="col-md-6">
												<label>Name:</label>
													<input class="validate-required" type="text" name="name" placeholder="Name" required />
													</div>
                                                <div class="col-md-6">
												<label>Booking Id</label>
													<input class="validate-required" type="text" name="b_id" placeholder="Booking Id" required />
													</div>
												
												<div class="col-md-12 ">
													<label>Your Experience With Us:</label>
													<textarea type="text" class="validate-required" name="feedback" placeholder="Your Experience and Feedback" required />
												</textarea>
												</div>
                                          <button type="submit" class="btn--sm btn--primary"  >Submit</button>
                                          </form>
										  <div ><?Php echo $msg; ?></div>
										  </br>
										
                                          
                                        </div>
                                   </div>
                                    <!--end of row-->
                                </div>
                                <!--end of container-->
                            </section>
                        </div>
                   
                    <footer class="footer-3 text-center-xs space--xs ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img alt="Image" class="logo" src="../img/the-trek-route-logo.png">
                            <ul class="list-inline list--hover">
                                <li class="list-inline-item">
                                    <a href="mailto:hello@thetrekroute.com">
                                        <span class="footer-stack-copyrightt">hello@thetrekroute.com</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-right text-center-xs">
                            <ul class="social-list list-inline list--hover">
							<li class="list-inline-item">
                                    <a href="policy.html">
                                        Our Policy
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="socicon socicon-google icon icon--xs"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/thetrekroute">
                                        <i class="socicon socicon-twitter icon icon--xs"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://fb.me/thetrekroute">
                                        <i class="socicon socicon-facebook icon icon--xs"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://instgram.com/thetrekroute">
                                        <i class="socicon socicon-instagram icon icon--xs"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-md-6">
                            <p class="footer-stack-copyright">
                                We Plan You Enjoy
                            </p>
                        </div>
                        <div class="col-md-6 text-right text-center-xs">
                            <span class="footer-stack-copyright">©
                                <span class="update-year">2019</span> Made by Digital Hindustan</span>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </footer>
        </div>
        <!--<div class="loader"></div>-->
        <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
            <i class="stack-interface stack-up-open-big"></i>
        </a>
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/flickity.min.js"></script>
        <script src="../js/easypiechart.min.js"></script>
        <script src="../js/parallax.js"></script>
        <script src="../js/typed.min.js"></script>
        <script src="../js/datepicker.js"></script>
        <script src="../js/isotope.min.js"></script>
        <script src="../js/ytplayer.min.js"></script>
        <script src="../js/lightbox.min.js"></script>
        <script src="../js/granim.min.js"></script>
        <script src="../js/jquery.steps.min.js"></script>
        <script src="../js/countdown.min.js"></script>
        <script src="../js/twitterfetcher.min.js"></script>
        <script src="../js/spectragram.min.js"></script>
        <script src="../js/smooth-scroll.min.js"></script>
        <script src="../js/scripts.js"></script>
         <script src="../js/custom.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168122803-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168122803-1');
</script>
	
		
	
	
    </body>
</html>