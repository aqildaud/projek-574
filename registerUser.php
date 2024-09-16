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
			font-weight: bold;
			background-color: #4d5e55;
			color: white;
			border: none;
			border-radius: 3px;
		}
	</style>
</head>
<body>
	<?php include 'navbar.php' ?>
	<form method="POST" action="registerUser.php">
		<div class="regcon">
			<h1>Create Account</h1>
			<label>Username</label><br>
			<input type="text" name="cust_username"><br>
			<label>Email</label><br>
			<input type="text" name="cust_email"><br>
			<label>Password</label><br>
			<input type="text" name="cust_password"><br>
			<label>Confirm Password</label><br>
			<input type="text" name="cust_cpassword"><br>
			<label>Phone Number</label><br>
			<input type="text" name="cust_phone"><br>
			<label>Address</label><br>
			<textarea name="cust_address"></textarea>
			<input type="submit" name="submit" value="Create">
		</div>
	</form>
	<?php
			if(isset($_POST['submit'])){
				$uname = $_POST['cust_username'];
				$email = $_POST['cust_email'];
				$password = $_POST['cust_password'];
				$cpassword = $_POST['cust_cpassword'];
				$phone = $_POST['cust_phone'];
				$address = $_POST['cust_address'];

				if($password == $cpassword){
					$query = "SELECT * FROM customer WHERE cust_email='$email'";
					$result = mysqli_query($link, $query);
					if (mysqli_num_rows($result)>0) {
						echo "User already exists. Try another email.";
					}else{
						$query = "INSERT INTO customer (cust_username, cust_email, cust_password, cust_phone, cust_address) VALUES ('$uname', '$email', '$password', '$phone', '$address')";
						$result = mysqli_query($link, $query);
						if ($result) {
							echo "
								<script>
									alert('Register Successful');
									window.location.href='loginUser.php';
								</script>
							";
						}else{
							echo "ERROR";
						}
					}
				}
				else{
					echo "
						<script>
								alert('Password does not match');
									window.location.href='registerUser.php';
								</script>
					";
					
				}

			}
		?>
</body>
</html>