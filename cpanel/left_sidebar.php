<?php include('session.php'); 
include('conn.php');
?>
<?php $data1=mysqli_query($conn,"select * from sistem");
            		  $numdata1=mysqli_num_rows($data1);

            		  $data2=mysqli_query($conn,"select * from kandidatet");
            		  $numdata2=mysqli_num_rows($data2);

            		  $data3=mysqli_query($conn,"select * from votuesit");
            		  $numdata3=mysqli_num_rows($data3);

            		  $data4=mysqli_query($conn,"select * from report");
            		  $numdata4=mysqli_num_rows($data4);


				?>
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>


				<li>
					<a class="active" href="dashboard.php"><div class="pull-left"><i class="zmdi zmdi-view-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><span class="label label-primary">top</span></div><div class="clearfix"></div></a>
				</li>

				<li><hr class="light-grey-hr mb-10"/></li>

				<li>
					<a  href="voting_tables.php"><div class="pull-left"><i class="zmdi zmdi-laptop-mac mr-20"></i><span class="right-nav-text">Voting Tables</span></div><div class="pull-right"><span class="label label-inverse"><?php echo $numdata1; ?></span></div><div class="clearfix"></div></a>
				</li>


				<li><hr class="light-grey-hr mb-10"/></li>

				<li>
					<a  href="candidates.php"><div class="pull-left"><i class="zmdi zmdi-account-box-mail mr-20"></i><span class="right-nav-text">Candidates</span></div><div class="pull-right"><span class="label label-success"><?php echo $numdata2; ?></span></div><div class="clearfix"></div></a>
				</li>

				<li><hr class="light-grey-hr mb-10"/></li>

				<li>
					<a  href="voters.php"><div class="pull-left"><i class="zmdi zmdi-accounts-add mr-20"></i><span class="right-nav-text">Voters</span></div><div class="pull-right"><span class="label label-info"><?php echo $numdata3; ?></span></div><div class="clearfix"></div></a>
				</li>

				<li><hr class="light-grey-hr mb-10"/></li>

				<li>
					<a  href="reports.php"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Reports</span></div><div class="pull-right"><span class="label label-danger"><?php echo $numdata4; ?></span></div><div class="clearfix"></div></a>
				</li>

				<li><hr class="light-grey-hr mb-10"/></li>




			</ul>
		</div>

		