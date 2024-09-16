<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<body>
	<div class="navbar">
		<a href="index.php"><img id="logo" src="image/ahgase3.png"></a>
		<a id="home" href="manage_book.php">Products</a>
		<a id="au" href="manageCust_order.php">Order</a>
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
							<form action='logoutProcess.php' method='POST'>
								<input type='submit' name='logoutA' value='Log Out'>
							</form>		  				
		  				";
		  			}
		  			else{
		  				echo "<a href='loginAdmin.php'>Log In</a>";
		  			}
		  		?>
		  	</div>
		  </div>
	</div>
</body>
</html>