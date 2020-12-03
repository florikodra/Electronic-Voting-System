<?php include('session.php'); 
include('conn.php'); 
$kandidat_id = $_GET['id'];
$Candidats=mysqli_query($conn, "select * from kandidatet where kandidat_id='$kandidat_id'")or die (mysql_error());
while ($cand=mysqli_fetch_array($Candidats)) {


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Voting System | Candidate: <?php echo $cand['kandidat_emer'] ?> - Preview</title>
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
<?
														$sistem_id=$cand['sistem_id'];
														$Voterskand=mysqli_query($conn, "select * from votuesit where sistem_id='$sistem_id' and status='1' and kandidat_id='$kandidat_id'")or die (mysql_error());
														$voterkand=mysqli_num_rows($Voterskand);
														
														$newww=mysqli_query($conn, "select * from votuesit where sistem_id='$sistem_id' and status='1'")or die (mysql_error());
														$nw=mysqli_num_rows($newww);

														$value=@(($voterkand/$nw)*100);
?>
<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
                                <div class="panel-body sm-data-box-1">
									<span class="uppercase-font weight-500 font-14 block text-center txt-dark">Preview Candidate : <?php echo $cand['kandidat_emer'] ?></span>	
									<div class="cus-sat-stat weight-500 txt-primary text-center mt-5">
										<span class="counter-anim">Voted : <?php echo $value;?></span><span>%</span>
									</div>
									<div class="progress-anim mt-20">
										<div class="progress">
											<div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="93.12" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $value;?>%;"></div>
										</div>
									</div>
									<ul class="flex-stat mt-5">
										<li>
											<span class="block">ID:</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $cand['kandidat_id'] ?></span><br>
											<span class="block">Name:</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $cand['kandidat_emer'] ?></span>
										</li>
										<li>
											<span class="block">Voting Table ID</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $cand['sistem_id'] ?></span><br>
											<span class="block">Description:</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $cand['Kandidat_description'] ?></span>
								
										</li>
										<li>
											<span class="block">Voters - Total</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $nw;?></span><br>
											<span class="block">Voters - Voted For Candidate</span>
											<span class="block txt-dark weight-500 font-15"><?php echo $voterkand;?></span><br>

										</li>

									</ul>
								</div>
                            </div>
                        </div>



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
												<?php	$voters=mysqli_query($conn,"select * from votuesit where kandidat_id='$kandidat_id' order by votues_id DESC");
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
				





				</div>
				<!-- /Row -->
			





<?}?>



			
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
