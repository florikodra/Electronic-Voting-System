<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<?php include('conn.php'); 
		
$vot_table = $_GET['id'];
$voting=mysqli_query($conn, "select * from sistem where sistem_id='$vot_table'")or die (mysql_error());
$vot=mysqli_fetch_array($voting);

$Candidats=mysqli_query($conn, "select * from kandidatet where sistem_id='$vot_table'")or die (mysql_error());
$cand=mysqli_num_rows($Candidats);

$Voters=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table'")or die (mysql_error());
$voter=mysqli_num_rows($Voters);

$Voters1=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table' and status='1'")or die (mysql_error());
$voter1=mysqli_num_rows($Voters1);

$Voters0=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table' and status='0'")or die (mysql_error());
$voter0=mysqli_num_rows($Voters0);

$result= ($voter1 / $voter)*100;

?>	
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Voting System | Voting Table - <?php echo $vot['Sistem_name'];?></title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content=""/>
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
		<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		<div class="wrapper  theme-1-active pimary-color-blue">
		<!-- Top Menu Items -->
	<?php include('top_menu.php'); ?>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
	<?php include('left_sidebar.php'); ?>
		<!-- /Left Sidebar Menu -->
		

				
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">


					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">

							<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
                                <div class="panel-body sm-data-box-1">
									<span class="uppercase-font weight-500 font-14 block text-center txt-dark">Voting Table : <?php echo $vot['Sistem_name'];?></span>	
									<div class="cus-sat-stat weight-500 txt-primary text-center mt-5">
										<span class="counter-anim">Completed : <?php echo $result;?></span><span>%</span>
									</div>
									<div class="progress-anim mt-20">
										<div class="progress">
											<div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="93.12" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $result;?>%;"></div>
										</div>
									</div>
									<ul class="flex-stat mt-5">
										<li>
											<span class="block">ID:</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $vot['sistem_id'];?></span><br>
											<span class="block">Status</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $vot['Sistem_status'];?></span>
										</li>
										<li>
											<span class="block">Nr. Candidats</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $cand;?></span><br>
											<span class="block">Nr. Voters</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $voter;?></span>
										</li>
										<li>
											<span class="block">Voters - Voted</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $voter1;?></span><br>
											<span class="block">Voters - Not Voted</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $voter0;?></span>
										</li>

									</ul>
								</div>
                            </div>
                        </div>

							<div class="panel panel-default card-view pb-0">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pb-0">
										<div class="row">
											<!-- item -->
											<?$query=mysqli_query($conn, "select * from kandidatet where sistem_id= '$vot_table'")or die (mysql_error());
													while($row4=mysqli_fetch_array($query)){ 
														$kand=$row4['kandidat_id'];
														

														$Voterskand=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table' and status='1' and kandidat_id='$kand'")or die (mysql_error());
														$voterkand=mysqli_num_rows($Voterskand);
														
														$newww=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table' and status='1'")or die (mysql_error());
														$nw=mysqli_num_rows($newww);

														$value=@(($voterkand/$nw)*100);
														
														
														?>
											<div class="col-lg-3 col-md-6 col-sm-12 text-center mb-30">
												<div class="panel panel-pricing mb-0">
													<div class="panel-heading">
														<i class=" ti-user"></i>
														<h4><?php echo $row4['kandidat_emer'];?></h4>
														<span class="counter"><?php echo $row4['Kandidat_description'];?></span>
													</div>
													<div class="panel-body text-center pl-0 pr-0">
														<hr class="mb-30"/>
														<ul class="list-group mb-0 text-center">
															<li class="list-group-item"><i class="fa fa-check"></i> Stats: <?php echo $value;?>%</li>
															<li><hr class="mt-5 mb-5"/></li>
															<li class="list-group-item"><i class="fa fa-check"></i> Nr. Voters: <?php echo $voterkand;?></li>
															
														</ul>
													</div>
													<div class="panel-footer pb-35">
														<a class="btn btn-success btn-rounded btn-lg" href="#" data-target="#responsive-modal-view-vt-<?php echo $row4['kandidat_id']; ?>" data-toggle="modal">See Voters</a>
													</div>
												</div>
											</div>


<!-- view  -->
			<div id="responsive-modal-view-vt-<?php echo $row4['kandidat_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">View All Voters for <?php echo $row4['kandidat_emer']; ?></h5>
													</div>
													<div class="modal-body">
								<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">	
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Nr. Amza</th>
														<th>Name Surname</th>
														<th>Email</th>
														<th>Voting Table ID</th>
														<th>Candidate</th>
													</tr>
												</thead>
												<tbody>
													<?php	
													$kandidatttid=$row4['kandidat_id'];
													$voters=mysqli_query($conn,"select * from votuesit where kandidat_id='$kandidatttid' and status='1' and sistem_id='$vot_table' order by votues_id DESC ");
													while($votersshow=mysqli_fetch_array($voters)){
												?>	<tr>
														<td><?php echo $votersshow['amza']; ?></td>
														<td><?php echo $votersshow['name']; ?></td>
														<td><?php echo $votersshow['email']; ?></td>
														<td><?php echo $votersshow['sistem_id']; ?></td>
														<td><?php echo $votersshow['kandidat_id']; ?></td>
														
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
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														
													</div>
													
												
												
												</div>
											</div>
										</div>
<!-- /view  -->
											<!-- /item -->
											<?}?>

											
										</div>	
									</div>	
								</div>	
							</div>	
						</div>	
					</div>	
					<!-- /Row -->
					
				</div>
				
				<!-- Footer -->
				<?php include('footer.php'); ?>
				<!-- /Footer -->
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
			<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="dist/js/export-table-data.js"></script>
	
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- Owl JavaScript -->
		<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
		
		<!-- Switchery JavaScript -->
		<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
		
	</body>
</html>