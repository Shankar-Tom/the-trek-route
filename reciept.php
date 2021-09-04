<?php
if(isset($_GET['bkid']))
{
	require('vendor/autoload.php');
	require ('inc/dbconnect.php');
	$bkid=$_GET['bkid'];
	
	$sql="SELECT payment_details.*,people_details.*,destination.*
	    FROM payment_details JOIN people_details ON payment_details.booking_id=people_details.booking_id AND 
		payment_details.booking_id='$bkid' JOIN destination ON payment_details.trip_name=destination.dname";
$result=mysqli_query($connect,$sql);
$result2=mysqli_query($connect,$sql);
$detail=mysqli_fetch_array($result);
$html='<link rel="stylesheet" href="txn.css"><body>
		<header>
			<h1>The Trek Route</h1>
			<address contenteditable>
				<p>CALL : +91 81145 77909</p>
				<p>E-Mail : hello@thetrekroute.com</p>
				<p>Website : thetrekroute.com</p>
			</address>
			
		</header>
		<article>
			<h1></h1>
			<address contenteditable>
				Booking Details
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Booking Id</span></th>
					<td><span contenteditable>'.$bkid.'</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Book for</span></th>
					<td><span contenteditable>'.$detail['trip_name'].'</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Paid Amount</span></th>
					<td><span id="prefix" contenteditable>INR : </span><span>'.$detail['amount'].'</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Name </span></th>
						<th><span contenteditable>Age</span></th>
						<th><span contenteditable>Phone</span></th>
						<th><span contenteditable>Email</span></th>
						
					</tr>
				</thead>
				<tbody>
					';
while($details=mysqli_fetch_array($result2))

{
	
	
 $html.=' <tr>
		<td><a class="cut"></a><span contenteditable>'.$details['name'].'</span></td>
		<td><span contenteditable>'.$details['age'].'</span></td>
		<td><span data-prefix></span><span contenteditable>'.$details['phone'].'</span></td>
		<td><span contenteditable>'.$details['email'].'</span></td>
		</tr>';
		
}
$html.='</table>
			
			<table class="balance">
				<tr>
					<th><span contenteditable>Booking Date</span></th>
					<td><span data-prefix></span><span>'.$detail['bdate'].'</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Trip Date</span></th>
					<td><span data-prefix></span><span contenteditable>'.$detail['tdate'].'</span></td>
				</tr>
		</table>
		</article>
		<aside>
			<h1><span contenteditable>Cancellation &amp; Refund Policies</span></h1>
			<div contenteditable>
				<h5>Before 7 days </h5><p>If you cancel the trek/event before 7 days or more we will refund you 80% of invoiced amount .We will deduct 20% of the amount as cancellation charge.</p>
				<h5>Between 3 to 5 days </h5><p>If you cancel the trek/event in between 3 to 5 days we will refund you 50% of invoiced amount .We will deduct 50% of the amount as cancellation charge.</p>
				<h5>Less than 3 days</h5><p>If you cancel less than before 3 days you will get only 30% of invoiced amount as refund. </p>
				<h5>last minute </h5><p>Last minute cancellation or one day before cancalltion will not be entertained and no refund will allow .</p>
			<h5>Note :</h5><p>You can transfer your bookings to anyone who is willing to join the trek/event to avoid loss of money!</p>
			</div>
		</aside>
	</body>';


$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='Receipt-'.$bkid.'.pdf';
$mpdf->output($file,'D');

}
?>