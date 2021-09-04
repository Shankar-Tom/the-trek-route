<?php
$page="Bookings";
include('header.php');
require('../inc/function.php');
$td=getMultipleRecordAll();
$tb=coun('id','people_details');
$pb=0;
$bp=0;
$fb=0;
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
                                    <table id="payments" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Booking Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Booked For</th>
                                                <th scope="col">Payment Status</th>
                                               
                                         </tr>
                                        </thead>
                                        <tbody>
                                             <?php
										    foreach($td as $tp)
											{
												echo '<tr>
														<td>'.$tp['booking_id'].'</td>
														<td>'.$tp['name'].'</td>
														<td>'.$tp['age'].'</td>
														<td>'.$tp['phone'].'</td>
														<td>'.$tp['trip_name'].'</td>
														<td>'.$tp['status'].'</td>
												</tr>';
												if($tp['status']=='PAID'){ $pb++;  }
												if($tp['status']=='PENDING'){ $bp++; }
												if($tp['status']=='FAILED'){ $fb++; }
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
                                                <h6 class="mt-0"><?php echo $tb; ?></h6>
                                                <p class="text-muted mb-0">Total Bookings</p></td>
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td>
                                                <h6 class="mt-0"><?php echo $pb; ?></h6>
                                                <p class="text-muted mb-0">Paid Bookings</p></td>
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td>
                                                <h6 class="mt-0"><?php echo $bp; ?></h6>
                                                <p class="text-muted mb-0">Unpaid Booking (Pending)</p></td>
                                           
                                        </tr>
                                        <tr>
                                           
                                            <td>
                                                <h6 class="mt-0"><?php echo $fb; ?></h6>
                                                <p class="text-muted mb-0">Payments Booking (Failed)</p></td>
                                           
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
		       <!-- end wrapper -->	
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#payments').DataTable();
} );
</script>
		