<?php include('session.php'); ?>
<?php
include('conn.php');
	$votues_id=$_GET['id'];
	
	
	mysqli_query($conn,"delete from votuesit where votues_id='$votues_id'");
	
	header('location:voters.php');

?>