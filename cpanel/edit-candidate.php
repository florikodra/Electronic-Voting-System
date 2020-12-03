<?php include('session.php'); ?>
												<?
												include('conn.php');
												$kandidat_id=$_GET['id'];
												$kandidat_emer=$_POST['kandidat_emer'];
												$Kandidat_description=$_POST['Kandidat_description'];
												$sistem_id=$_POST['sistem_id'];
												mysqli_query($conn,"update kandidatet set kandidat_emer = '$kandidat_emer', Kandidat_description = '$Kandidat_description' , sistem_id = '$sistem_id' where kandidat_id='$kandidat_id'");
												?>
												<script>
												window.location.replace("candidates.php");
												</script>
												