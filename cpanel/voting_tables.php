<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Voting System | Voting Tables</title>
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
								<h2 class="panel-title txt-dark">Voting Tables</h2><br>
								<button class="btn btn-primary btn-icon left-icon" data-target="#responsive-modal-add-table" data-toggle="modal"> <i class="fa fa-plus-circle"></i> <span>Add a voting table.</span></button>

<!-- add table -->
			<div id="responsive-modal-add-table" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Add a voting table.</h5>
													</div>

													<div class="modal-body">
														<form action="" method="POST">
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Name:</label>
																<input type="text" class="form-control" id="recipient-name" name="Sistem_name" required>
															</div>
															<div class="form-group">
																<label for="message-text" class="control-label mb-10">Status:</label>
																<select type="text" class="form-control" id="message-text" name="Sistem_status" required>
																<option>Draft</option>
																</select> 
																
															</div>
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" name="insert" class="btn btn-primary">Insert Into Database</button>
													</div>
												</form>
												<? if(isset($_POST['insert'])) {
												

												$Sistem_name=$_POST['Sistem_name'];
												$Sistem_status=$_POST['Sistem_status'];
												mysqli_query($conn,"insert into sistem (Sistem_name, Sistem_status) values ('$Sistem_name', '$Sistem_status')");
												?>
												<script>
												window.location.replace("voting_tables.php");
												</script>
												<?php }?>




												</div>
											</div>
										</div>
<!-- /add table -->



								<div class="panel-body">

									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Table ID</th>
														<th>Name</th>
														<th>Status</th>
														<th>Actions</th>
													</tr>
												</thead>

												<tbody>
													
												<?php
					$sistem=mysqli_query($conn,"select * from sistem order by sistem_id DESC");
					while($sistemshow=mysqli_fetch_array($sistem)){
					?>								<tr>
														<td><?php echo $sistemshow['sistem_id']; ?></td>
														<td><?php echo $sistemshow['Sistem_name']; ?></td>
														<td><?php echo $sistemshow['Sistem_status']; ?></td>
														<td>
															<?php
            $sistemid=$sistemshow['sistem_id'];
            $kandidatet=mysqli_query($conn,"select * from kandidatet where sistem_id='$sistemid'");
            $numkandidatet=mysqli_num_rows($kandidatet); 
            $votuesit=mysqli_query($conn,"select * from votuesit where sistem_id='$sistemid'");
            $numvotuesit=mysqli_num_rows($votuesit); 

            ?><? if($numkandidatet > 0 or $numvotuesit > 0){?>
            	<button class="btn btn-danger btn-rounded btn-anim" data-target="#responsive-modal-del-nooo" data-toggle="modal"><i class="fa fa-exclamation-triangle"></i><span class="btn-text">delete</span></button>  



            	<?}
            	else { ?>
            	<button class="btn btn-danger btn-rounded btn-anim" data-target="#responsive-modal-del-vt-<?php echo $sistemshow['sistem_id']; ?>" data-toggle="modal"><i class="fa fa-trash-o"></i><span class="btn-text">delete</span></button> 
            	<?}?>


															
															<button class="btn btn-warning btn-rounded btn-anim" data-target="#responsive-modal-edit-vt-<?php echo $sistemshow['sistem_id']; ?>" data-toggle="modal"><i class="fa fa-pencil"></i><span class="btn-text">edit</span></button>  <a href="previews-voting-tables.php?id=<?php echo $sistemshow['sistem_id']; ?>" class="btn btn-success btn-rounded btn-anim"><i class="fa fa-desktop"></i><span class="btn-text">preview</span></a></td>
														
													</tr>

<!-- delete  -->
			<div id="responsive-modal-del-nooo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">You cant delete this voting table.</h5>
													</div>
													<div class="modal-body">
														<center><img src="http://www.raveguardian.com/uploads/2014/12/icon_emergency1.png" width="200" height="200"></center>

													<h5 class="mb-15">Reasons why you cant delete this:</h5>
														<p>An existing Candidate with this voting table id is in use.</p>
														<p>An existing Voter with this voting table id is in use.</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														
													</div>
												</div>
											</div>
										</div>
<!-- /delete  -->	
<!-- edit  -->
			<div id="responsive-modal-edit-vt-<?php echo $sistemshow['sistem_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Edit voting table.</h5>
													</div>
													<div class="modal-body">
														<form method="POST" action="edit-voting-table.php?id=<?php echo $sistemshow['sistem_id']; ?>">
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Name:</label>
																<input type="text" class="form-control" id="recipient-name" name="Sistem_name" value="<?php echo $sistemshow['Sistem_name']; ?>">
															</div>
															<div class="form-group">
																<label for="message-text" class="control-label mb-10">Status:</label>
																<select type="text" class="form-control" id="message-text" name="Sistem_status">
																<option><?php echo $sistemshow['Sistem_status']; ?></option>
																<option>Draft</option>
																<option>Proccesing</option>
																<option>Completed</option>
																<option>Archive</option>
																</select> 
																
															</div>
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<input type="submit" name="edit" class="btn btn-warning" value="Edit voting table.">
													</div></form>
													
												
												
												</div>
											</div>
										</div>
<!-- /edit  -->


<!-- delete  -->
			<div id="responsive-modal-del-vt-<?php echo $sistemshow['sistem_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Delete voting table.</h5>
													</div>
													<div class="modal-body">
														<center><img src="http://www.raveguardian.com/uploads/2014/12/icon_emergency1.png" width="200" height="200"></center>

													<h5 class="mb-15">Do you want to delete this voting table from database?</h5>
														<p>After deleting this voting table you want be able to return or back up it.</p>
														<p>So think twice before taking this action.</p>
													</div>
													<div class="modal-footer">
														<input type="id" name="sistem_id" hidden="true" value="<?php echo $sistemshow['sistem_id']; ?>">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<a href="delete-voting-table.php?id=<?php echo $sistemshow['sistem_id']; ?>" type="button" class="btn btn-danger">Delete</a>
														
													</div>
												</div>
											</div>
										</div>
<!-- /delete  -->		

<?php
					}
				?>
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
	<script src="dist/js/dashboard-data.js"></script>

	
</body>

</html>
