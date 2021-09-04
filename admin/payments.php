<?php
$page="Payments";
include('header.php');
require('../inc/function.php');
$td=getMultipleRecord('payment_details');
$ttrans=coun('booking_id','payment_details');
$transsucc=counWithStand('amount','payment_details','status','PAID');
$pendpay=counWithStand('amount','payment_details','status','PENDING');;
$failpay=counWithStand('amount','payment_details','status','FAILED');
?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title m-0"><?php echo $page ?></h4>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
				
                <div class="row">
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table  id="payments" class="table table-hover" >
                                        <thead>
                                            <tr>
                                               
                                                <th scope="col">Booking Id</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Payment Id</th>
                                               <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                           <?php
										    foreach($td as $tp)
											{
												echo '<tr>
														<td>'.$tp['booking_id'].'</td>
														<td>'.$tp['amount'].'</td>
														<td>'.$tp['status'].'</td>
														<td>'.$tp['rzp_id'].'</td>
														<td>'.$tp['bdate'].'</td>
												</tr>';
											}
										   ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Other Details</h4>
                                <table class="table table-striped mb-0">
                                    <tbody>
                                        <tr>
                                            
                                            <td>
                                                <h6 class="mt-0"><?php echo $ttrans;?></h6>
                                                <p class="text-muted mb-0">Total Transaction</p></td>
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td>
                                                <h6 class="mt-0"><?php echo $transsucc;?></h6>
                                                <p class="text-muted mb-0">Successful Payments</p></td>
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td>
                                                <h6 class="mt-0"><?php echo $pendpay;?></h6>
                                                <p class="text-muted mb-0">Pending Payments</p></td>
                                           
                                        </tr>
                                        <tr>
                                           
                                            <td>
                                                <h6 class="mt-0"><?php echo $failpay;?></h6>
                                                <p class="text-muted mb-0">Failed Transaction</p></td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- end container-fluid -->
        </div>
        <!-- end wrapper -->	
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#payments').DataTable();
} );
</script>
		