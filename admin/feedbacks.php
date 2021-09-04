<?php
$page="Feedbacks";
include('header.php');
require('../inc/function.php');
$tfeed=coun('id','feedbacks');
$td=getMultipleRecord('feedbacks');

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
                                    <table class="table table-hover" id="feedbacks">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Feedback</th>
                                                <th scope="col">Feedback For </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
										    foreach($td as $tp)
											{
												echo '<tr>
														<td>'.$tp['name'].'</td>
														<td>'.$tp['feedback'].'</td>
														<td>'.$tp['feed_for'].'</td>
												</tr>';
											}
										   ?>
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
                                                <h6 class="mt-0"><?php echo $tfeed; ?></h6>
                                                <p class="text-muted mb-0">Total Feedbacks</p></td>
                                            
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
    $('#feedbacks').DataTable();
} );
</script>
				