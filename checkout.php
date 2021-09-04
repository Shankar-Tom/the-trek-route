<?php
if(!isset($_POST['people']))
{
	header('Location:book');
	die();
}
session_start();
require ('inc/dbconnect.php');
$people=$_POST['people'];
$code =$_POST['code'];
date_default_timezone_set('Asia/Kolkata');
require('razorpay-php/config.php');
require('razorpay-php/Razorpay.php');
$sql="SELECT * FROM `destination` WHERE dcode='$code'";
$result=mysqli_query($connect,$sql);
$bd=mysqli_fetch_array($result);
$price=$bd['price'];
$trip=$bd['dname'];
$tdate=$bd['tdate'];
$date= date("d/m/yy");
$amount=$people*$price;
$bookid=$code.rand(1000,9999);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>THE TREK ROUTE | CHECKOUT</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="The Dalma Trek will commemce from Nov, 2019 & will continue till Feb, 2020">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme_pay.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="../css/jquery.classycountdown.css" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">
		<style>
		    .skp_wrapper .bottom-btn-container {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 15px;
    text-align: center;
}
form{
text-align:center !important;    
}
 .razorpay-payment-button {
    width: 100%;
    text-align: center !important;
    font-weight: normal !important;
    font-size: 16px;
    max-width: 450px;
    }
   form> .razorpay-payment-button {
    background: #ff4f4f;
    padding: 10px 15px;
    border-radius: 20px;
    border: solid 1px #c4c4c4;
    outline: none;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    min-width: 160px;
    text-align: left;
    height: 50px;
    text-decoration: none;
    position: relative;
    transition: 0.3s ease all;
}

		</style>
</head>
<body class="skp_wrapper ">
    <!--<div class="col-3 col-md-2">-->
                            
    <!--                            <img class="logo logo-dark" alt="logo" src="../img/the-trek-route-logo.png" />-->
                               
                            
    <!--                    </div>-->

        <div class="nav-container ">
            <div class="bar bar--sm visible-xs">
                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-12 col-md-12 ">
                            <a >
                               <img class="logo logo-dark" alt="logo" src="img/the-trek-route-logo.png" />
                                    <img class="logo logo-light" alt="logo" src="img/the-trek-route-logo.png" />
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
            <!--end bar-->
            <nav id="menu1" class="bar bar--sm bar-1 hidden-xs ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs text-center">
                            <div class="bar__module text-center">
                                <a >
                                    <img class="logo logo-dark" alt="logo" src="img/the-trek-route-logo.png" style="max-height:unset"/>
                                    <img class="logo logo-light" alt="logo" src="img/the-trek-route-logo.png" style="max-height:unset"/>
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>
            <!--end bar-->
        </div>
        <section class="bg--secondary space--sm" style="padding-top:5px;padding-bottom:5px;">
                <div class="container">
                    <div class="row" style="padding-top: 8px;">
                        <div class="col-lg-2">
                            
                        </div>
                        <div class="col-lg-8">
                            <div class="boxed boxed--lg boxed--border" style="padding: 1.23em;border-radius: 15px;">
                                <div id="account-profile" class="account-tab">
                
                                	<h3 class="text-center" style="font-weight:800;">CONFIRM DETAILS</h3>
                                	<table border="1">
									<thead>
									<td>Name</td>
									<td>Mobile Number</td>
									<td>Email</td>
									<td>Age</td>
									</thead>
                                			<tbody>
                                			<?php
											for($i=1;$i<=$people;$i++)
											{
												echo '<tr><td>'.$_POST['name'.$i].'</td>
												<td>'.$_POST['phone'.$i].'</td>
												<td>'.$_POST['email'.$i].'</td>
												<td>'.$_POST['age'.$i].'</td></tr>';
											}

?>											
                           
                                			</table>
                                			<table border="1">
									<thead>
									<td>Price/Person</td>
									<td>Payable Amount</td>
									<td>Trip Name</td>
									<td>Trip Date</td>
									</thead>
									<tbody>
									<?php
									echo '<tr><td>'.$price.'</td>
									<td>'.$amount.'</td>
									<td>'.$trip.'</td>
									<td>'.$tdate.'</td></tr>';
									?>
									</tbody>
									</table>
                                	</div>
                                
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
			<?php
	
		// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => $bookid,
    'amount'          =>$people*$price*100 , // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "THE TREK ROUTE",
    "description"       => "Payment for ".$bd['dname'],
    "image"             => "https://thetrekroute.com/img/the-trek-route-logo.png",
    "prefill"           => [
    "name"              => $_POST['name1'],
    "email"             => $_POST['email1'],
    "contact"           => $_POST['phone1'],
    "cc1"               => $bookid,
    ],
    "notes"             => [
    "address"           => "",
    "merchant_order_id" => $bookid,
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("razorpay-php/{$checkout}.php");

$amn=$price*$people;

for($i=1;$i<=$people;$i++)
{
	$name=$_POST['name'.$i];
	$phone=$_POST['phone'.$i];
	$email=$_POST['email'.$i];
	$age=$_POST['age'.$i];
	$sql= "INSERT INTO people_details(`name`,`phone`,`email`,`age`,`booking_id`) VALUES ('$name','$phone','$email','$age','$bookid') ";
	mysqli_query($connect,$sql);
	
}
$sql2="INSERT INTO payment_details(`booking_id`,`amount`,`status`,`rzp_id`,`bdate`,`trip_name`)
						VALUES ('$bookid','$amn','PENDING','$razorpayOrderId','$date','$trip')";
						mysqli_query($connect,$sql2);
							
							
			?>