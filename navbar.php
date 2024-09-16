<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div class="navbar">
		<a href="index.php"><img id="logo" src="image/ahgase3.png"></a>
		<a id="home" href="index.php">Home</a>
		<a href="catalog.php">Catalog</a>
		<a id="au" href="about.php">About Us</a>
		<input type="text" name="search" placeholder="Search...">
		<div class="dropdown">
		    <img class="dropbtn" onclick="myFunction()" id="icon" src="image/user.png">
		  	<div class="dropdown-content" id="myDropdown">
		  		<?php 
		  			if(isset($_SESSION['cust_email'])){
		  				$query = mysqli_query($link, "SELECT * FROM customer WHERE cust_email='$_SESSION[cust_email]'");
		  				while($row = mysqli_fetch_assoc($query)){
							$uname = $row['cust_username'];
						}
		  				echo "<a style='text-align: center;' href='index.php'>$uname</a>";
		  				echo "
							<form action='logoutProcess.php' method='POST'>
								<input type='submit' name='logoutC' value='Log Out'>
							</form>		  				
		  				";
		  			}
		  			else{
		  				echo "<a href='loginUser.php'>Log In</a>
		  					<a href='loginAdmin.php'>Log In as admin</a>
		  				";
		  			}
		  		?>
		  	</div>
		  </div>
		  <div class="dropdown">
		    <img class="dropbtn" onclick="myFunction1()" id="icon" src="image/cart.png">
		  	<div class="dropdown-content" id="myDropdown1">
		  		<?php 
		  			if(isset($_SESSION['cust_email'])){
		  				echo "<a href='cart.php'>My Cart</a>";
		  				echo "
		  					<form action='order.php' method='POST'>
								<input type='submit' name='view_order' value='My Order'>
							</form>
						";
		  			}
		  			else{
		  				echo "<a href='cart.php'>My Cart</a>";
		  			}
		  		?>
		  	</div>
		  </div>
	</div>
	<script>
	/* When the user clicks on the button, 
	toggle between hiding and showing the dropdown content */
	function myFunction() {
	  document.getElementById("myDropdown").classList.toggle("show");
	}
	function myFunction1() {
	  document.getElementById("myDropdown1").classList.toggle("show");
	}

	// Close the dropdown if the user clicks outside of it
	window.onclick = function(e) {
	  if (!e.target.matches('.dropbtn')) {
	  var myDropdown = document.getElementById("myDropdown");
	    if (myDropdown.classList.contains('show')) {
	      myDropdown.classList.remove('show');
	    }
	  }
	}
	window.onclick = function(event) {
	  if (!event.target.matches('.dropbtn')) {
	  var myDropdown = document.getElementById("myDropdown1");
	    if (myDropdown.classList.contains('show')) {
	      myDropdown.classList.remove('show');
	    }
	  }
	}
	</script>
</body>
</html>