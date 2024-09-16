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
			background-color: #343434;
			font-family: candara;
		}
		<?php include 'navbarAdmin.css'?>
		img{
			max-height: 95px;
		}
		.show {
		  display: block;
		}
		.dropdown:hover .dropdown-content {display: block;}
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
			background-color: #343434;
			border: 1px solid lightgrey;
			color: lightgrey;
		}
		.regcon label{
			float: left;
			color: lightgrey;
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
			color: lightgrey;
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
	<?php include 'navbarAdmin.php'?>
	<form method="POST" action="registerAdmin.php">
		<div class="regcon">
			<h1>Create Account</h1>
			<label>Admin Username</label><br>
			<input type="text" name="admin_uname"><br>
			<label>Admin Email</label><br>
			<input type="text" name="admin_email"><br>
			<label>Password</label><br>
			<input type="text" name="admin_password"><br>
			<label>Confirm Password</label><br>
			<input type="text" name="admin_cpassword"><br>
			<label>Phone Number</label><br>
			<input type="text" name="admin_no"><br>
			<input type="submit" name="regAdmin" value="Create">
		</div>
	</form>
	<?php
			if(isset($_POST['regAdmin'])){
				$uname = $_POST['admin_uname'];
				$email = $_POST['admin_email'];
				$password = $_POST['admin_password'];
				$cpassword = $_POST['admin_cpassword'];
				$phone = $_POST['admin_no'];

				if($password == $cpassword){
					$query = "SELECT * FROM admin WHERE admin_email='$email'";
					$result = mysqli_query($link, $query);
					if (mysqli_num_rows($result)>0) {
						echo "User is already exists. Try another email.";
					}else{
						$query = "INSERT INTO admin (admin_uname, admin_email, admin_password, admin_no) VALUES ('$uname', '$email', '$password', '$phone')";
						$result = mysqli_query($link, $query);
						if ($result) {
							echo "
								<script>
									alert('Registered Successfully');
									window.location.href='loginAdmin.php';
								</script>
							";
						}else{
							echo "ERROR";
						}
					}
				}

			}
		?>
</body>
</html>