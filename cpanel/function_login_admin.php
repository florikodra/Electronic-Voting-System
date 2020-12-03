<?php
session_start();
	include('conn.php');
	
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$username=$_POST["username"];
		$password = $_POST["password"];
		//$hashed_password = hash('sha512', $password);
		
		$query=mysqli_query($conn,"select * from `users` where username='$username' and password='$password'");
		while($row=mysqli_fetch_array($query)){
		//If username and password exist in our database then create a session.
		//Otherwise echo error.

		if(mysqli_num_rows($query) > 0)
		{
		?>
		<script>window.location="dashboard.php";</script>
		<?php
		//header("location: dashboard.php"); // Redirecting To Other Page
		$_SESSION['id'] = $row['user_id']; // Initializing Session
		session_start();
		}else{ ?>
		<script type='text/javascript'>alert('Username Or password not correct!');</script>

		<?

		}

		}
	}
?>