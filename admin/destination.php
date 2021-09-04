<?php
date_default_timezone_set("Asia/Kolkata");
$page="Destinations";
include('header.php');
require('../inc/function.php');
$td=getMultipleRecord('destination');
$dc=coun('id','destination');
$ttdate=date('Y-m-d');
$pd=0;
$ud=0;
$tdd=0;
?>
<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-8">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title m-0"><?php echo $page ?></h4>
                                </div>
                                <div class="col-md-4">
                 <button class="btn btn-primary waves-effect waves-light" onclick="add()">Add Destination</button>
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
                                                <th scope="col"> Code</th>
                                                <th scope="col"> Name</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Date</th>
												<th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										 <?php
										    foreach($td as $tp)
											{
												echo '<tr>
														<td>'.$tp['dcode'].'</td>
														<td>'.$tp['dname'].'</td>
														<td>'.$tp['image'].'</td>
														<td>'.$tp['price'].'</td>
														<td>'.$tp['tdate'].'</td>
														<td>
														<button onclick="view('.$tp['id'].')"><i class="typcn typcn-zoom-in "></i></button>
														<button onclick="edit('.$tp['id'].')"><i class="typcn typcn-pencil"></i></button>
														<button onclick="deldest('.$tp['id'].')"><i class="typcn typcn-trash "></i></button>
														</td>
												</tr>';
												if($tp['tdate'] < $ttdate){ $pd++; }
												if($tp['tdate'] > $ttdate){ $ud++; }
												if($tp['tdate'] == $ttdate){ $tdd++; }
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
                                                <h6 class="mt-0"><?php echo $dc; ?></h6>
                                                <p class="text-muted mb-0">Total Destination</p></td>
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td>
                                                <h6 class="mt-0"><?php echo $tdd; ?></h6>
                                                <p class="text-muted mb-0">Today Events</p></td>
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td>
                                                <h6 class="mt-0"><?php echo $ud; ?></h6>
                                                <p class="text-muted mb-0">Upcoming Events</p></td>
                                           
                                        </tr>
                                        <tr>
                                           
                                            <td>
                                                <h6 class="mt-0"><?php echo $pd; ?></h6>
                                                <p class="text-muted mb-0">Past Events</p></td>
                                           
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
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="adddest">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                              <div class="modal-header">
                             <h5 class="modal-title mt-0" id="myLargeModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" id="modalBody">
              
                                                    </div>
													
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>
        <!-- end wrapper -->	
       <!-- end wrapper -->	
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="assets/destination.js"></script>
<script>
$(document).ready( function () {
    $('#payments').DataTable();
} );

</script>
				