<?php
if(!isset($_POST['b_id']))
{
	header('Location:status');
	die();
}
$bkid=$_POST['b_id'];
require ('inc/dbconnect.php');
require('razorpay-php/config.php');
require('razorpay-php/Razorpay.php');
 use Razorpay\Api\Api;
 session_start();
 $query="SELECT booking_id FROM people_details WHERE booking_id='$bkid' OR phone='$bkid'";
 $bkr=mysqli_query($connect,$query);
 $bkd=mysqli_fetch_array($bkr);
$bkid2=$bkd['booking_id'];
$sql="SELECT payment_details.*,people_details.*,destination.*
	    FROM payment_details JOIN people_details ON payment_details.booking_id=people_details.booking_id AND 
		people_details.booking_id='$bkid2' JOIN destination ON payment_details.trip_name=destination.dname";

$result=mysqli_query($connect,$sql);
$result2=mysqli_query($connect,$sql);

if(mysqli_num_rows($result)>0)
{
$bd=mysqli_fetch_array($result);
$amount=$bd['amount'];
$razorpayOrderId=$bd['rzp_id'];
$tname=$bd['trip_name'];
$status=$bd['status'];
$tdate=$bd['tdate'];
$bdate=$bd['bdate'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>The Trek Route | Status</title>
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
                               <img class="logo logo-dark" alt="logo" src="../img/the-trek-route-logo.png" />
                                    <img class="logo logo-light" alt="logo" src="../img/the-trek-route-logo.png" />
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
                                    <img class="logo logo-dark" alt="logo" src="../img/the-trek-route-logo.png" style="max-height:unset"/>
                                    <img class="logo logo-light" alt="logo" src="../img/the-trek-route-logo.png" style="max-height:unset"/>
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
        
                <!--end of container-->
            </section>
			<section class="bg--secondary space--sm" style="padding-top:5px;padding-bottom:5px;">
                <div class="container">
                    <div class="row" style="padding-top: 8px;">
                        <div class="col-lg-2">
                            
                        </div>
                        <div class="col-lg-8">
                            <div class="boxed boxed--lg boxed--border" style="padding: 1.23em;border-radius: 15px;">
                                <div id="account-profile" class="account-tab">
                
                                	<h3 class="text-center" style="font-weight:800;">YOUR BOOKING STATUS</h3>
                                	<table border="1">
                                			<tbody>
											<thead>
											<td>Booking Id </td>
											<td>Booking Date</td>
											<td>Paid Amount</td>
											<td>Trip Name</td>
											<td>Tour/Trip Date</td>
											<td>Payment Status</td>
											</thead>
											<tr>
                                				<td><?php echo $bkid2 ;?></td>
                                				<td><?php echo $bdate;; ?></td>
                                				<td><?php echo $amount; ?></td>
                                				<td><?php echo $tname; ?></td>
                                				<td><?php echo $tdate; ?></td>
                                				<td><?php echo $status ;?></td>
                                			</tr>
                                			</table>
                                			<table border="1">
                                			<tbody>
											<thead>
											<td>Name </td>
											<td>Age</td>
											<td>Phone</td>
											<td>Email</td>
											
											</thead>
											<?php
												while($pd=mysqli_fetch_array($result2))
												{
													
													echo '<tr>
                                				<td>'.$pd['name'].'</td>
                                				<td>'.$pd['age'].'</td>
                                				<td>'.$pd['phone'].'</td>
                                				<td>'.$pd['email'].'</td>
                                				
                                			</tr>
													';
												}
												
											
											?>
											
											</table>
                                	</div>
                                
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
			<?php
		if($status != 'PAID'){
			
			
		// Create the Razorpay Order



$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => $bkid2,
    'amount'          =>$amount*100 , // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];



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
    "name"              => $bd['name'],
    "email"             => $bd['email'],
    "contact"           => $bd['phone'],
    "cc1"               => $bkid2,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => $bkid2,
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
		}
		else{
			echo '<center><a href="reciept?bkid='.$bkid2.'">Download Receipt</a><c/enter>';
		}
}
else{
	echo '<script>alert("No Booking Found With This Id");
	window.location="status";
	</script>';
}
			?>
