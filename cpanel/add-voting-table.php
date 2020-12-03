<?php include('session.php'); ?>
<?php
include('conn.php');
	$Sistem_name=$_POST['Sistem_name'];
	$Sistem_status=$_POST['Sistem_status'];
	
	
	
	mysqli_query($conn,"insert into sistem (Sistem_name, Sistem_status, address, contact) values ('$Sistem_name', '$Sistem_status')");
	
	?>
		<script>

			window.history.back();
		</script>
	<?php
?>