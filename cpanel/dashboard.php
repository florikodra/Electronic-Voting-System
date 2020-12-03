<?php include('session.php'); 
include('conn.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Voting System | Dashboard</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content=""/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper  theme-1-active pimary-color-blue">
		<!-- Top Menu Items -->
	<?php include('top_menu.php'); ?>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
	<?php include('left_sidebar.php'); ?>
		<!-- /Left Sidebar Menu -->

		

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-40">
            	
				<!-- Row -->
				<div class="row">
					
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<img class="img-responsive" src="dist/background.png" width="100%"><br>
						<div class="panel panel-default card-view">

							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Information About Voting Tables</h6>
								</div>
								<?php $voting1=mysqli_query($conn,"select * from sistem where Sistem_status='Draft'");
            					      $numvoting1=mysqli_num_rows($voting1);

            					      $voting2=mysqli_query($conn,"select * from sistem where Sistem_status='Proccesing'");
            					      $numvoting2=mysqli_num_rows($voting2); 

            					      $voting3=mysqli_query($conn,"select * from sistem where Sistem_status='Completed'");
            					      $numvoting3=mysqli_num_rows($voting3); 

            					      $voting4=mysqli_query($conn,"select * from sistem where Sistem_status='Archive'");
            					      $numvoting4=mysqli_num_rows($voting4); 



            					      ?>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div>
										<span class="pull-left inline-block capitalize-font txt-dark">
											Voting Tables - Draft
										</span>
										<span class="label label-primary pull-right"><?php echo $numvoting1; ?></span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											Voting Tables - Proccesing
										</span>
										<span class="label label-primary pull-right"><?php echo $numvoting2; ?></span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											Voting Tables - Completed
										</span>
										<span class="label label-primary pull-right"><?php echo $numvoting3; ?></span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											Voting Tables - Archived
										</span>
										<span class="label label-primary pull-right"><?php echo $numvoting4; ?></span>
										<div class="clearfix"></div>
									</div>
								</div>	
							</div>
						</div>
						
                        </div>
					
				</div>
				<!-- /Row -->
				<?php $data1=mysqli_query($conn,"select * from sistem");
            		  $numdata1=mysqli_num_rows($data1);

            		  $data2=mysqli_query($conn,"select * from kandidatet");
            		  $numdata2=mysqli_num_rows($data2);

            		  $data3=mysqli_query($conn,"select * from votuesit");
            		  $numdata3=mysqli_num_rows($data3);

            		  $data4=mysqli_query($conn,"select * from report");
            		  $numdata4=mysqli_num_rows($data4);


				?>

				<!-- Row -->
				<div class="row">
					<a class="col-lg-3 col-md-6 col-sm-6 col-xs-12" href="voting_tables.php">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter"><span class="counter-anim"><?php echo $numdata1; ?></span></span>
													<span class="weight-500 uppercase-font block font-13">Voting Tables</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-laptop-mac data-right-rep-icon txt-light-grey"> </i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a class="col-lg-3 col-md-6 col-sm-6 col-xs-12" href="candidates.php">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter"><span class="counter-anim"><?php echo $numdata2; ?></span></span>
													<span class="weight-500 uppercase-font block">Candidates</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-account-box-mail data-right-rep-icon txt-light-grey"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a class="col-lg-3 col-md-6 col-sm-6 col-xs-12" href="voters.php">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter"><span class="counter-anim"><?php echo $numdata3; ?></span></span>
													<span class="weight-500 uppercase-font block">Voters</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-accounts-add data-right-rep-icon txt-light-grey"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a class="col-lg-3 col-md-6 col-sm-6 col-xs-12" href="reports.php">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter"><span class="counter-anim"><?php echo $numdata4; ?></span></span>
													<span class="weight-500 uppercase-font block">Reports</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-flag data-right-rep-icon txt-light-grey"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<!-- /Row -->

				<!-- Row -->
				<div class="row">
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">social campaigns</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<a href="#" class="pull-left inline-block full-screen mr-15">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
									
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover mb-0">
												<thead>
													<tr>
														<th>Report ID</th>
														<th>Report Name</th>
														<th>Report Subject</th>
														<th>Report Email</th>
														<th>Report Message</th>
													</tr>
												</thead>
												<tbody>
													<?php	$reportss=mysqli_query($conn,"select * from report order by id DESC LIMIT 10");
													while($report=mysqli_fetch_array($reportss)){
												?>
													<tr>
														<td><span class="txt-dark weight-500"><?php echo $report['id']; ?></span></td>
														<td><?php echo $report['name']; ?></td>
														<td><?php echo $report['subject']; ?></td>
														<td><?php echo $report['email']; ?></td>
														<td><?php echo $report['message']; ?></td>
													</tr>
													<? } ?>
												</tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>
						</div>
					</div>
				</div>	
				<!-- Row -->
			</div>
			
			<!-- Footer -->
			<?php include('footer.php'); ?>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
	<script src="dist/js/easypiechart-data.js"></script>

    <!-- Counter Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- EChartJS JavaScript -->
	<script src="vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
	<script src="vendors/echarts-liquidfill.min.js"></script>
	
	<!-- Toast JavaScript -->
	<script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script src="dist/js/dashboard-data.js"></script>
</body>

</html>
