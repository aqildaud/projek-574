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
		.navbar{
			overflow: hidden;
			padding: 25px;
			margin: auto;
			margin-top: 50px;
			width: 90%;
			text-align: center;		
		}
		.navbar a{
			text-decoration: none;
			color: lightgrey;
			margin: 25px;
			font-size: 15px;
		}
		.navbar input[type=text]{
			margin-right: 25px;
			border: none;
			border-bottom: 1px solid grey;
			vertical-align: middle;
			color: lightgrey;
			background: #343434;
		}
		#au{
			margin-right: 350px;
		}
		#icon{
			width: 20px;
			height: 20px;
			vertical-align: middle;
		}
		#logo{
			width: 50px;
			height: 50px;
			vertical-align: middle;
			margin-right: 400px;
		}
		#home{
			margin-left: 100px;
		}
		img{
			max-height: 95px;
		}
		.dropdown {
			display: inline-block;
		}
		.dropdown .dropbtn {
		  cursor: pointer;
		  font-size: 16px;  
		  border: none;
		  outline: none;
		  color: white;
		  padding: 8px 12px;
		  background-color: inherit;
		  font-family: inherit;
		  margin: 0;
		}
		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: #343434;
		  min-width: 160px;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		}

		.dropdown-content a {
		  float: none;
		  color: lightgrey;
		  padding: 8px 12px;
		  text-decoration: none;
		  display: block;
		  text-align: left;
		}
		.dropdown-content input[type=submit]{
			float: none;
			color: black;
		  	text-decoration: none;
		  	display: block;
		  	text-align: center;
		  	border: none;
		  	font-size: 15px;
		  	font-family: inherit;
		  	margin: 20px auto;
		  	padding: 12px 16px;

		}

		.dropdown-content a:hover {
		  background-color: lightgrey;
		  color: #343434;
		}
		.dropdown-content input[type=submit]:hover {
		  background-color: #343434;
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
			margin-bottom: 15px;
		}
		.regcon a, p{
			text-decoration: none;
			color: lightgrey;
			font-size: 16.5px;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div class="navbar">
		<a href="index.php"><img id="logo" src="image/ahgase3.png"></a>
		<a id="home" href="index.php">Home</a>
		<a href="catalog.php">Catalog</a>
		<a id="au" href="about.php">About Us</a>
		<input type="text" name="search" placeholder="Search...">
		<div class="dropdown">
		    <img class="dropbtn" onclick="myFunction()" id="icon" src="image/admin.png">
		  	<div class="dropdown-content" id="myDropdown">
		  		<?php 
		  			if(isset($_SESSION['admin_email'])){
		  				$query = mysqli_query($link, "SELECT * FROM admin WHERE admin_email='$_SESSION[admin_email]'");
		  				while($row = mysqli_fetch_assoc($query)){
							$uname = $row['admin_uname'];
						}
		  				echo "<a style='text-align: center;' href='index.php'>$uname</a>";
		  				echo "
							<form action='order.php' method='POST'>
								<input type='submit' name='logout' value='Log Out'>
							</form>		  				
		  				";
		  				if(isset($_POST['logout'])){
							session_start();
							unset($_SESSION['admin_email']);
							header('location:loginAdmin.php');
						}
		  			}
		  			else{
		  				echo "<a href='loginAdmin.php'>Log In</a>";
		  			}
		  		?>
		  	</div>
		  </div>
	</div>
	<form method="POST" action="loginAdmin.php">
		<div class="regcon">
			<h1>Login</h1>
			<label>Email</label><br>
			<input type="text" name="admin_email"><br>
			<label>Password</label><br>
			<input type="text" name="admin_password"><br>
			<input type="submit" name="loginAdmin" value="Sign In"><br>
			<input type="hidden" name="cust_id">
			<p>or</p>
			<a href="registerAdmin.php">Create Account</a>
		</div>
	</form>
		<?php
			if (isset($_POST['loginAdmin'])) {
			 	$email = $_POST['admin_email'];
			 	$password = $_POST['admin_password'];

			 	$query = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'";
			 	$result = mysqli_query($link, $query);

			 	if (mysqli_num_rows($result)>0) {
			 		$_SESSION['admin_email'] = $email;
			 		echo"
							<script>
								alert('Login Successful');
								window.location.href='manage_book.php';
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