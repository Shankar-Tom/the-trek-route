<?php
$page="Dashboard";
include('header.php');
require('../inc/function.php');
$amn=sum('amount','payment_details');
$ttrans=coun('booking_id','payment_details');
$tb=coun('id','people_details');
$td=coun('id','destination');
$paysucc=sumWithCond('amount','payment_details','status','PAID');
$transsucc=counWithStand('amount','payment_details','status','PAID');
$pendpay=sumWithCond('amount','payment_details','status','PENDING');
$failpay=sumWithCond('amount','payment_details','status','FAILED');
$transpend=counWithStand('amount','payment_details','status','PENDING');
$transfail=counWithStand('amount','payment_details','status','FAILED');
//print_r($transsucc);exit();

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
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mini-stat">
                            <div class="p-3 mini-stat-desc">
                                <div class="clearfix">
                                    <h6 class="text-uppercase mt-0 float-left text-white-50">Total Amount</h6>
                                    <h4 class="mb-3 mt-0 float-right"><?php echo $amn;?></h4>
                                </div>
                               
                                
                            </div>
                            <div class="p-3">
                                <div class="float-right">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a>
                                </div>
                                <p class="font-14 m-0">Transactions : <?php echo $ttrans;?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info mini-stat">
                            <div class="p-3 mini-stat-desc">
                                <div class="clearfix">
                                    <h6 class="text-uppercase mt-0 float-left text-white-50">Paid Amount</h6>
                                    <h4 class="mb-3 mt-0 float-right"><?php echo $paysucc;?></h4>
                                </div>
                                
                            </div>
                            <div class="p-3">
                                <div class="float-right">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-buffer h5"></i></a>
                                </div>
                                <p class="font-14 m-0">Transactions : <?php echo $transsucc;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-pink mini-stat">
                            <div class="p-3 mini-stat-desc">
                                <div class="clearfix">
                                    <h6 class="text-uppercase mt-0 float-left text-white-50">Pending Amount</h6>
                                    <h4 class="mb-3 mt-0 float-right"><?php echo $pendpay;?></h4>
                                </div>
                               
                            </div>
                            <div class="p-3">
                                <div class="float-right">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-tag-text-outline h5"></i></a>
                                </div>
                                <p class="font-14 m-0">Transactions : <?php echo $transpend;?></p>
                            </div>
                        </div>
                    </div>		
<div class="col-xl-3 col-md-6">
                        <div class="card bg-danger mini-stat">
                            <div class="p-3 mini-stat-desc">
                                <div class="clearfix">
                                    <h6 class="text-uppercase mt-0 float-left text-white-50">Failed</h6>
                                    <h4 class="mb-3 mt-0 float-right"><?php echo $failpay;?></h4>
                                </div>
                                
                            </div>
                            <div class="p-3">
                                <div class="float-right">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a>
                                </div>
                                <p class="font-14 m-0">Transactions : <?php echo $transfail;?></p>
                            </div>
                        </div>
                    </div>
                </div>  
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Home Notice</h4>
								<div id="msg" style="color:blue"></div>
                                <form class="" action="#" id="notice">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <input type="text" name="type" class="form-control" required placeholder="eg. Alert/Hot"/>
                                    </div>
								<div class="form-group">
                                        <label>Notice</label>
                                        <div>
                                            <input type="text" name="notice" class="form-control" required placeholder=""/>
                                        </div>
                                    </div>
									 </form>
                                    <div class="form-group">
                                        <div>
                                            <button onclick="addnotic()" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                         </div>
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
                                                <h6 class="mt-0"><?php echo $tb;?></h6>
                                                <p class="text-muted mb-0">Total Bookings</p></td>
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td>
                                                <h6 class="mt-0"><?php echo $td;?></h6>
                                                <p class="text-muted mb-0">Total Destinations</p></td>
                                            
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
   <script src="assets/pages/dashboard.int.js"></script>
<script>
function addnotic()
{
	$.ajax({
		url:'ajax/addnotice',
		data:new FormData($('#notice')[0]),
		type:'post',
		cache: false,
		processData: false,
		contentType: false,
		success:function(data)
		{
		if(data)
		{
		$('#msg').text(data);
		}
		}
	});
}
</script>   