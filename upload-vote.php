<?php include('session.php'); ?>
<?php
include('conn.php');
	$kandidatnew_id=$_GET['id'];
	
	
	
	mysqli_query($conn," update votuesit set kandidat_id='$kandidatnew_id', status='1' where votues_id='$session_idvot' ");
	
	?>
		<script>

			 window.location='logout_success.php';
		</script>
	<?php
?>