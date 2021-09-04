<?php
session_start();
if(!isset($_SESSION['user']))
{
 header('Location:index');
 die();
}
?>


<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Lock Screen | The Trek Route</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="js/vendor/modernizr.min.js"></script>
    </head>
    <body>
        <!-- Login Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="bg.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <!-- END Login Full Background -->

        <!-- Login Container -->
        <div id="login-container" class="animation-hatch">
            <!-- Login Title -->
            <div class="login-title text-right">
                <h1 class="text-center">
                    <h1 >The Trek Route</h1>
                    <strong style="color:red" ><?php echo $_SESSION['type']; ?></strong><br>
                   
                </h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block">
                <form class="form-horizontal push" id="form-login">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="input-group">
							<input type="hidden" value="<?php echo $_SESSION['user']; ?>" name="login-email">
                                <input type="password" id="lock-password" name="login-password" class="form-control" placeholder="Password">
                              </div>
				</div>
                    </div>
               		 </form>
					 <div id="msg"></div>
                 <button  class="btn btn-primary" onclick="login()">Unlock</button>
				
            
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>
		<script src="js/login.js"></script>
		<script src="js/custom.js"></script>
		<script>
		$(function(){ Login.init(); });
		
		</script>
    </body>
</html>