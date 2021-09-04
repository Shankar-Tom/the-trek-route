<?php
require ('inc/dbconnect.php');
require('razorpay-php/config.php');
session_start();
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'shopping_order_id' => $_POST['shopping_order_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
	$query2="UPDATE payment_details SET status='PAID' WHERE rzp_id='".mysqli_real_escape_string($connect,$_SESSION['razorpay_order_id'])."'";
	mysqli_query($connect,$query2);	
	$slq="SELECT payment_details.*,people_details.*
	    FROM payment_details JOIN people_details WHERE payment_details.booking_id=people_details.booking_id 
		AND payment_details.rzp_id='".mysqli_real_escape_string($connect,$_SESSION['razorpay_order_id'])."'"; 
$pdr=mysqli_query($connect,$slq);
$pd=mysqli_fetch_array($pdr);
	$bkid= $pd['booking_id'];
	$html='<html> <link href="txn.css" rel="stylesheet" type="text/css" media="all" />
	<title>Payment Status</title>
	<center>
<div class="container">
  <div class="ui middle aligned center aligned grid">
    <div class="ui eight wide column">
	<div class="ui icon negative message">
            <i class="warning icon"></i>
            <div class="content">
              <div class="header">
                Booking Successful
				<div>
              <p>Name- '.$pd['name'].'</p>
            </div>
              <div>
              <p>Booking id - '.$bkid.'</p>
            </div>
            <div>
              <p>Amount - '.$pd['amount'].'</p>
            </div>
			<div>
              <p>Phone - '.$pd['phone'].'</p>
            </div>
			<div>
              <p>Email - '.$pd['email'].'</p>
            </div>
         </div>
      <p>Please</p>
          <a href="reciept?bkid='.$bkid.'"  class="ui large teal submit fluid button">Download Receipt</a>
    </div>
  </div>
</div> 
</center>
</html>
	
	';
	$mail="SELECT email,name FROM people_details WHERE booking_id='$bkid'";
	$mr=mysqli_query($connect,$mail);
	while($mid=mysqli_fetch_array($mr))
	{
		$from='noreply@thetrekroute.com';
		$reply='hello@thetrekroute.com';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$reply."\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$subject='Payment successful for '.$pd['trip_name'];
	$to=$mid['email'];
	$message='<h1 style="color:green">hello '.$mid['name'].'</h1 ><br><p>Please download your booking reciept.<br><a type="button" href="reciept?bkid='.$bkid.'">Download</a>';
	//echo $message;
	mail($to,$subject,$message,$headers);
	}
}
else
{
	$query2="UPDATE payment_details SET payst='FAILED' WHERE rzp_id='".mysqli_real_escape_string($connect,$_SESSION['razorpay_order_id'])."'";
			  mysqli_query($connect,$query2);
    $html ='<html>
   <link href="txn.css" rel="stylesheet" type="text/css" media="all" />
    
    <div class="container">
  <div class="ui middle aligned center aligned grid">
    <div class="ui eight wide column">
   
      <form class="ui large form">
                
          <div class="ui icon negative message">
            <i class="warning icon"></i>
            <div class="content">
              <div class="header">
                Oops! Something went wrong.
              </div>
              <p>Payment failed .Please try again </p>
            </div>
            
         </div>
      <a href="status" class="ui large teal submit fluid button">Click here </a>
      </form>
    </div>
  </div>
</div>
</html>';
}

echo $html;

?>
