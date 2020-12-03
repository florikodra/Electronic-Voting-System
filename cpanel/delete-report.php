<?php include('session.php'); ?>
<?php
include('conn.php');
	$report_id=$_GET['id'];
	
	
	mysqli_query($conn,"delete from report where id='$report_id'");
	
	header('location:reports.php');

?>