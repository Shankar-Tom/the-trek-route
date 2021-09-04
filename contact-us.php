<?php
$page='Contact Us';
include('header.php');
?>
    <body class=" ">
        <a id="start"></a>
        <!-- Your customer chat code -->
		  <!-- Load Facebook SDK for JavaScript -->
		  <div id="fb-root"></div>
		  <script>
			window.fbAsyncInit = function() {
			  FB.init({
				xfbml            : true,
				version          : 'v4.0'
			  });
			};

			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		  }(document, 'script', 'facebook-jssdk'));</script>
		  <div class="fb-customerchat"
			attribution=setup_tool
			page_id="410107552861826">
		  </div>
        
            <!--end bar-->
        </div>
        <div class="main-container">
            <section class="cover height-40 imagebg text-center" data-overlay="2" id="home">
                <div class="background-image-holder">
                    <img alt="background" src="img/about.jpg" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-6">
                            <h1>Let's talk about your tour</h1>
                            <p class="lead">
                               Call Us or Drop a mail to plan your tour.
                            </p>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="switchable ">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-5">
                            <p class="lead">
                                E:
                                <a href="#">hello@thetrekroute.com</a>
                                <br /> <a href="tel:+91-9939287334">P: +91 9939 287 334</a>
                                <br /> <a href="tel:+91-8114577909">P: +91-8114577909</a>
                                </br /><a href="https://api.whatsapp.com/send?phone=+918114577909&text=hello"> Whatsapp Us</a>
                            </p>
                            <p class="lead">
                                Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days.
                            </p>
                            <p class="lead">
                                We are open from 9am &mdash; 5pm week days.
                            </p>
                        </div>
                        <div class="col-md-6 col-12">
                            <form class="form-email row" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly." >
                                <div class="col-md-6 col-12">
                                    <label>Your Name:</label>
                                    <input type="text" name="Name" class="validate-required" />
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Email Address:</label>
                                    <input type="email" name="email" class="validate-required validate-email" />
                                </div>
                                <div class="col-md-12 col-12">
                                    <label>Message:</label>
                                    <textarea rows="4" name="Message" class="validate-required"></textarea>
                                </div>
                                <div class="col-md-5 col-lg-4 col-6">
                                    <button type="submit" class="btn btn--primary type--uppercase">Send Enquiry</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end of row-->
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
        </div>
        <!--<div class="loader"></div>-->
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