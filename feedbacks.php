<?php
$page="Feedbacks";
include('header.php');
require ('inc/dbconnect.php');
$sql="SELECT * FROM feedbacks";
$result=mysqli_query($connect,$sql);
?>

            <!--end bar-->
        </div>
          <class="main-container">
            <section class="text-center imagebg space--md" data-overlay="3">
                <div class="background-image-holder">
                    <img alt="background" src="img/trekhead.jpg" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-6">
                            <h1>Reviews</h1>
                            
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
                                <h3>Cutomer's Words</h3>
                            </div>
                        </div>
                    </div>
                    <div class="slider slider--ken-burns" data-arrows="true" >
                        <ul class="slides">
						<?php
						if(mysqli_num_rows($result)>0)
						{
							while($fd = mysqli_fetch_array($result))
							{
								
                           echo ' <li class="col-md-12 col-12">
                                 <section class="switchable ">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-md-6">
                            <p class="lead">
                                   '.$fd['feedback'].'
                                </p>
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <div class="switchable__text">
                                <div class="text-block">
                                    <h2>'.$fd['name'].'</h2>
									<span>Feedback for '.$fd['feed_for'].'</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
							</li>';
							}
						}
						
							?>
                        </ul>
                    </div>
                    <!--end slider-->
                </div>
                <!--end of container-->
            </section>
        <footer class="footer-3 text-center-xs space--xs ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img alt="Image" class="logo" src="img/the-trek-route-logo.png">
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
         <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
            <i class="stack-interface stack-up-open-big"></i>
        </a>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/flickity.min.js"></script>
        <script src="js/easypiechart.min.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/typed.min.js"></script>
        <script src="js/datepicker.js"></script>
        <script src="js/isotope.min.js"></script>
        <script src="js/ytplayer.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/granim.min.js"></script>
        <script src="js/jquery.steps.min.js"></script>
        <script src="js/countdown.min.js"></script>
        <script src="js/twitterfetcher.min.js"></script>
        <script src="js/spectragram.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/scripts.js"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168122803-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168122803-1');
</script>
	
    </body>
</html>