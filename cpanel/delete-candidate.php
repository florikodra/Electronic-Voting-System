<?php include('session.php'); ?>
<?php
include('conn.php');
	$candidate_id=$_GET['id'];
	
	
	mysqli_query($conn,"delete from kandidatet where kandidat_id='$candidate_id'");
	
	header('location:candidates.php');

?>