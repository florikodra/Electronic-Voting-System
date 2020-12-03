<?php include('session.php'); ?>
												<?
												include('conn.php');
												$sistem_id=$_GET['id'];
												$Sistem_name=$_POST['Sistem_name'];
												$Sistem_status=$_POST['Sistem_status'];
												mysqli_query($conn,"update sistem set Sistem_name = '$Sistem_name', Sistem_status = '$Sistem_status' where sistem_id='$sistem_id'");
												?>
												<script>
												window.location.replace("voting_tables.php");
												</script>
												