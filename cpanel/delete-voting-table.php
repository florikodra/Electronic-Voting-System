<?php include('session.php'); ?>
<?php
include('conn.php');
	$sistem_id=$_GET['id'];
	
	
	mysqli_query($conn,"delete from sistem where sistem_id='$sistem_id'");
	
	header('location:voting_tables.php');

?>