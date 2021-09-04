<?php

session_start();

if(!isset($_SESSION['pass']))
{
if(!isset($_SESSION['user']))
{
 header('Location:../login/');
 die();
}
header('Location:../login/lock');
 die();
}
require('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $page; ?>-Admin | The Trek Route</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- morris css -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>

        <div class="header-bg">
            <!-- Navigation Bar-->
            <header id="topnav">
                <div class="topbar-main">
                    <div class="container-fluid">

                        <!-- Logo-->
                        <div>
                            
                            <a href="index.html" class="logo">
                                <h3>The Trek Route</h3>
                            </a>

                        </div>
                        <!-- End Logo-->

                        <div class="menu-extras topbar-custom navbar p-0">

                           

                            <!-- Search input -->
                           

                            <ul class="list-inline ml-auto mb-0">
                                
                           
                                <!-- User-->
                                <li class="list-inline-item dropdown notification-list nav-user">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="false" aria-expanded="false">
                                        <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle">
                                        <span class="d-none d-md-inline-block ml-1">ADMIN <i class="mdi mdi-chevron-down"></i> </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                     
                                        
                                        <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted"></i> Settings</a>
                                        <a class="dropdown-item" href="lock" ><i class="dripicons-lock text-muted"></i> Lock screen</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void()" onclick="logout()"><i class="dripicons-exit text-muted"></i> Logout</a>
                                    </div>
                                </li>
                                <li class="menu-item list-inline-item">
                                    <!-- Mobile menu toggle-->
                                    <a class="navbar-toggle nav-link">
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <!-- End mobile menu toggle-->
                                </li>

                            </ul>

                        </div>
                        <!-- end menu-extras -->

                        <div class="clearfix"></div>

                    </div> <!-- end container -->
                </div>
                <!-- end topbar-main -->

                <!-- MENU Start -->
                <div class="navbar-custom">
                    <div class="container-fluid">
                        
                        <div id="navigation">

                            <!-- Navigation Menu-->
                            <ul class="navigation-menu">

                                <li >
<a href="dashboard" <?php if($page=='Dashboard'){ echo 'style="color:green"'; } ?>><i class="dripicons-home"></i> Dashboard</a>
                                </li>
								 <li class="active">
                                    <a href="payments" <?php if($page=='Payments'){ echo 'style="color:green"'; } ?>><i class="fas fa-rupee-sign"></i> Payments</a>
                                </li>
								 <li class="active">
                                    <a href="bookings" <?php if($page=='Bookings'){ echo 'style="color:green"'; } ?>><i class="fas fa-list-alt  "></i>Bookings</a>
                                </li>
								 <li class="active">
                                    <a href="destination" <?php if($page=='Destinations'){ echo 'style="color:green"'; } ?>><i class="fas fa-plane-departure "></i> Destination</a>
                                </li>
								 <li class="active">
                                    <a href="feedbacks" <?php if($page=='Feedbacks'){ echo 'style="color:green"'; } ?>><i class="fas fa-paste "></i> Feedbacks</a>
                                </li>
					

                            </ul>
                            <!-- End navigation menu -->
                        </div> <!-- end #navigation -->
                    </div> <!-- end container -->
                </div> <!-- end navbar-custom -->
            </header>
            <!-- End Navigation Bar-->

        </div>
		<!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael.min.js"></script>

        <!-- dashboard js -->
        

        <!-- App js -->
        <script src="assets/js/app.js"></script>
		<script>
		function logout(){
			if(confirm('Are you sure to logout ?'))
			{
			$.ajax({
					url:'logout.php',
					success:function(data)
					{
						if(data==1)
						{
						 window.location="../login/";
						}
					}
				});
			}
		}
		
		</script>