<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Voting System | Reports</title>
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
								<h2 class="panel-title txt-dark">Reports</h2><br>





								<div class="panel-body">

									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Report ID</th>
														<th>Report Name</th>
														<th>Report Subject</th>
														<th>Report Email</th>
														<th>Report Message</th>
														<th>Actions</th>


													</tr>
												</thead>

												<tbody>
												<?php	$reportss=mysqli_query($conn,"select * from report order by id DESC");
													while($report=mysqli_fetch_array($reportss)){
												?>	<tr>
														<td><?php echo $report['id']; ?></td>
														<td><?php echo $report['name']; ?></td>
														<td><?php echo $report['subject']; ?></td>
														<td><?php echo $report['email']; ?></td>
														<td><?php echo $report['message']; ?></td>
														<td><button class="btn btn-warning btn-rounded btn-anim" data-target="#responsive-modal-reply-<?php echo $report['id']; ?>" data-toggle="modal"><i class="fa fa-pencil"></i><span class="btn-text">Reply</span></button>

															<button class="btn btn-danger btn-rounded btn-anim" data-target="#responsive-modal-del-report-<?php echo $report['id']; ?>" data-toggle="modal"><i class="fa fa-trash-o"></i><span class="btn-text">delete</span></button> 
			


														</td>
														<div id="responsive-modal-del-report-<?php echo $report['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Delete report.</h5>
													</div>
													<div class="modal-body">
														<center><img src="http://www.raveguardian.com/uploads/2014/12/icon_emergency1.png" width="200" height="200"></center>

													<h5 class="mb-15">Do you want to delete this report from database?</h5>
														<p>After deleting this report you want be able to return or back up it.</p>
														<p>So think twice before taking this action.</p>
													</div>
													<div class="modal-footer">
														<input type="id" name="sistem_id" hidden="true" value="<?php echo $sistemshow['sistem_id']; ?>">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<a href="delete-report.php?id=<?php echo $report['id']; ?>" type="button" class="btn btn-danger">Delete</a>
														
													</div>
												</div>
											</div>
										</div>
													<!-- Report Reply -->
			<div id="responsive-modal-reply-<?php echo $report['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Reply to a Report</h5>
													</div>
													<div class="modal-body">
														<form  method="POST">
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Email to:</label>
																<input type="text" class="form-control" id="recipient-name" name="email" value="<?php echo $report['email']; ?>">
															</div>
															<div class="form-group">
																<label for="text" class="control-label mb-10">My Email:</label>
																<input type="email" class="form-control" id="text" name="adminemail" value="info@florikodra.com" readonly>
															</div>
															<div class="form-group">
																<label for="text" class="control-label mb-10">Subject:</label>
																<input type="text" class="form-control" id="text" name="subject" value="Re: <?php echo $report['subject']; ?>">
															</div>
															<div class="form-group">
																<label for="message-text" class="control-label mb-10">Message:</label>
																<textarea type="text" class="form-control" id="message-text" name="description" rows="10" placeholder="<?php echo $report['message']; ?>"><?php echo $report['message']; ?> --------------------------------------------------------</textarea>
																
																
															</div>
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" name="report" class="btn btn-primary">Reply to User</button>
													</div></form>

													<?php
include('conn.php');
  if (isset($_POST['report']))
    {
 
      $emailtjt ="info@florikodra.com";
      $name = $_POST['name'];
      $subject = $_POST['subject'];
      $description = $_POST['description'];
      $to = $_POST['email'];
      $body='Email: '.$email .' <br> Description: '.$description .'';

      
      
      

      $headers = 'From: Sistemi i Votimit Elektronik <'.$emailtjt .'>' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
      mail($to, $subject, $body, $headers);
      ?>
												<script>
												alert("Mail Send Successful!");
												window.location.replace("reports.php");
												</script> <?php
          exit;
    }
  ?>



												</div>
											</div>
										</div>
<!-- /Report Reply -->	
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
