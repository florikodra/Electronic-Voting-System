<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Voting System | Voters</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content=""/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
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
	<?php include('conn.php'); ?>

		
		

		<!-- Main Content -->
		<div class="page-wrapper">
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<h2 class="panel-title txt-dark">Voters</h2><br>
								<button class="btn btn-primary btn-icon left-icon" data-target="#responsive-modal-add-voters" data-toggle="modal"> <i class="fa fa-plus-circle"></i> <span>Add a voter.</span></button>

<!-- add voters -->
			<div id="responsive-modal-add-voters" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Add a voter.</h5>
													</div>
													<div class="modal-body">
														<form action="upload-voter.php" method="POST">
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Name Surname:</label>
																<input type="text" class="form-control" id="recipient-name" name="name" required>
															</div>
															<div class="form-group">
																<label for="text" class="control-label mb-10">Email:</label>
																<input type="email" class="form-control" id="text" name="email" required>
															</div>
															<div class="form-group">
																<label for="text" class="control-label mb-10">Amza:</label>
																<input type="number" class="form-control" id="text" name="amza" required>
															</div>
															<div class="form-group">
																<label for="message-text" class="control-label mb-10">Voting Table ID:</label>
																<select type="text" class="form-control" id="message-text" name="sistem_id" required>
																<option></option>
																<?php $sistem=mysqli_query($conn,"select * from sistem order by sistem_id DESC");
																while($sistemshow=mysqli_fetch_array($sistem)){
																?>
																<option value="<?php echo $sistemshow['sistem_id']; ?>"><?php echo $sistemshow['sistem_id']; ?> - <?php echo $sistemshow['Sistem_name']; ?> - <?php echo $sistemshow['Sistem_status']; ?></option> <? } ?>
																</select> 
																
															</div>
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" name="submit" class="btn btn-primary">Insert Into Database</button>
													</div></form>
												</div>
											</div>
										</div>
<!-- /add voters -->



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
														<th>Actions</th>


													</tr>
												</thead>

												<tbody>
												<?php	$voters=mysqli_query($conn,"select * from votuesit order by votues_id DESC");
													while($votersshow=mysqli_fetch_array($voters)){
												?>	<tr>
														<td><?php echo $votersshow['amza']; ?></td>
														<td><?php echo $votersshow['name']; ?></td>
														<td><?php echo $votersshow['email']; ?></td>
														<td><?php echo $votersshow['sistem_id']; ?></td>
														<td><?php echo $votersshow['kandidat_id']; ?></td>
														<td>

															<?php
			$kandstatus=$votersshow['status'];
            $sistemid=$votersshow['sistem_id'];
            $voters11=mysqli_query($conn,"select * from sistem where sistem_id='$sistemid'");
            while($votersshow11=mysqli_fetch_array($voters11)){
            	$statusisistem = $votersshow11['Sistem_status'];
            
            ?>
							<? if($statusisistem=='Proccesing' or $statusisistem=='Completed' or ($statusisistem=='Draft' and $kandstatus=='1')){?>
            	<button class="btn btn-danger btn-rounded btn-anim" data-target="#responsive-modal-del-nooo" data-toggle="modal"><i class="fa fa-exclamation-triangle"></i><span class="btn-text">delete</span></button>  



            	<?}
            	else { ?>
            	<button class="btn btn-danger btn-rounded btn-anim" data-target="#responsive-modal-del-voter-<?php echo $votersshow['votues_id']; ?>" data-toggle="modal"><i class="fa fa-trash-o"></i><span class="btn-text">delete</span></button> 






            	<?  } } ?>								






														</td>

														<!-- delete  -->
			<div id="responsive-modal-del-nooo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">You cant delete this Voter.</h5>
													</div>
													<div class="modal-body">
														<center><img src="http://www.raveguardian.com/uploads/2014/12/icon_emergency1.png" width="200" height="200"></center>

													<h5 class="mb-15">Reasons why you cant delete this:</h5>
														<p>The voting sistem is still procesing or completed.</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														
													</div>
												</div>
											</div>
										</div>
<!-- /delete  -->	



            	<div id="responsive-modal-del-voter-<?php echo $votersshow['votues_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Delete voter.</h5>
													</div>
													<div class="modal-body">
														<center><img src="http://www.raveguardian.com/uploads/2014/12/icon_emergency1.png" width="200" height="200"></center>

													<h5 class="mb-15">Do you want to delete this voter from database?</h5>
														
														<p>After deleting this voter you want be able to return or back up it.</p>
														<p>So think twice before taking this action.</p>
													</div>
													<div class="modal-footer">
														<input type="id" name="votues_id" hidden="true" value="<?php echo $votersshow['votues_id']; ?>">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<a href="delete-voter.php?id=<?php echo $votersshow['votues_id']; ?>" type="button" class="btn btn-danger">Delete</a>
														
													</div>
												</div>
											</div>
										</div>
														
													</tr>
												<?php } ?>
												</tbody>

											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				





				</div>
				<!-- /Row -->
			









			
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
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
</body>

</html>
