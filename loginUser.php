<?php
	include 'config.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Account</title>
	<style type="text/css">
		body{
			margin: 0;
			background-color: white;
			font-family: candara;
		}
		<?php include 'navbar.css' ?>
		.regcon{
			width: 30%;
			margin: 100px auto;
			text-align: center;
		}
		.regcon input[type=text]{
			width: 100%;
			padding: 10px;
			border-radius: 3px;
			border: 1px solid grey;
			margin-bottom: 15px;
			margin-top: 5px;
			font-family: candara;
		}
		.regcon label{
			float: left;
		}
		.regcon textarea{
			width: 100%;
			padding: 10px;
			border-radius: 3px;
			border: 1px solid grey;
			font-family: candara;
			margin-top: 5px;
		}
		.regcon h1{
			text-align: center;
			font-family: garamond;
		}
		.regcon input[type=submit]{
			padding: 10px 30px 10px 30px;
			font-family: garamond;
			font-size: 20px;
			margin-top: 50px;
			margin-bottom: 20px;
			font-weight: bold;
			background-color: #4d5e55;
			color: white;
			border: none;
			border-radius: 3px;
		}
		.regcon a{
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
	<?php 
		include 'navbar.php';
	?>
	<form method="POST" action="loginUser.php">
		<div class="regcon">
			<h1>Login</h1>
			<label>Email</label><br>
			<input type="text" name="cust_email"><br>
			<label>Password</label><br>
			<input type="text" name="cust_password"><br>
			<input type="submit" name="submit" value="Sign In"><br>
			<input type="hidden" name="cust_id">
			<a href="registerUser.php">Create Account</a>
		</div>
	</form>
		<?php
			if (isset($_POST['submit'])) {
			 	$email = $_POST['cust_email'];
			 	$password = $_POST['cust_password'];

			 	$query = "SELECT * FROM customer WHERE cust_email='$email' AND cust_password='$password'";
			 	$result = mysqli_query($link, $query);

			 	if (mysqli_num_rows($result)>0) {
			 		$_SESSION['cust_email'] = $email;
			 		echo "
			 			<script>
								alert('Login Successful');
								window.location.href='index.php';
							</script>
			 		";

			 	}
			 	else{
			 		echo "
			 			<script>
			 				alert('Incorrect Email or Password');
			 			</script>
			 		";
			 	}
			 } 
	 	?>
</body>
</html>