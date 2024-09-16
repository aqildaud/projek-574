<?php
	include 'config.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		body{
			margin: 0;
			background-color: white;
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
			color: black;
			margin: 25px;
			font-size: 15px;
		}
		.navbar input[type=text]{
			margin-right: 25px;
			border: none;
			border-bottom: 1px solid grey;
			vertical-align: middle;
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
			margin-right: 500px;
		}
		#home{
			margin-left: 50px;
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
		  padding: 14px 16px;
		  background-color: inherit;
		  font-family: inherit;
		  margin: 0;
		}
		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: #f9f9f9;
		  min-width: 160px;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		}

		.dropdown-content a {
		  float: none;
		  color: black;
		  padding: 12px 16px;
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
		  background-color: #ddd;
		}
		.dropdown-content input[type=submit]:hover {
		  background-color: #ddd;
		}

		.show {
		  display: block;
		}
		.dropdown:hover .dropdown-content {display: block;}
		.container{
			width: 70%;
			margin: 100px auto;
		}
		.cart_img{
			width: 130px;
			padding: 22px;
		}
		.cart_text{
			padding-right: 15px;
			padding: 22px;
			font-size: 1.125em;
			min-width: 100px;
			font-weight: 700;
		}
		.cart_price{
			padding: 22px;
		}
		.cart_quantity{
			color: #000;
			margin: 10px 30px;
			text-align: center;
		}
		.cart_quantity{
			padding: 22px;
		}
		.cart_quantity input[type=number]{
			width: 70%;
		}
		td{
			width: 100%;
		}
		.cart_total{
			padding: 22px;
		}
		.cart_total2{
			border-top: 1px solid grey;
			padding: 22px;
		}
		.cart_stat{
			padding: 22px;
			text-align: center;
		}
		.container h3{
			color: red;
			text-align: center;
		}
		.cart_date{
			font-family: Garamond;
			font-weight: bold;
			font-size: 18px;
		}
	</style>
</head>
<body>
	<div class="navbar">
		<a href="index.php"><img id="logo" src="image/ahgase3.png"></a>
		<a id="home" href="index.php">Home</a>
		<a href="bookins.php">Catalog</a>
		<a id="au" href="">About Us</a>
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
							<form action='order.php' method='POST'>
								<input type='submit' name='logout' value='Log Out'>
							</form>		  				
		  				";
		  				if(isset($_POST['logout'])){
							session_start();
							unset($_SESSION['cust_email']);
							header('location:index.php');
						}
		  			}
		  			else{
		  				echo "<a href='loginUser.php'>Log In</a>";
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
	<div class="container">
		<table>
			<tr>
				<td colspan="2">Product</td>
				<td class="cart_price">Price</td>
				<td class="cart_quantity">Quantity</td>
				<td class="cart_total" style="text-align: right;">Total</td>
				<td class="cart_stat">Status</td>
			</tr>
			<?php
				$subTotal = 0;
				$count = 0;
				if(isset($_SESSION['cust_email'])){
					if(isset($_POST['view_order'])){
						$sql1 = "SELECT * FROM customer WHERE cust_email='$_SESSION[cust_email]'";
						$result = mysqli_query($link, $sql1);
						while($row = mysqli_fetch_assoc($result)){
							$id = $row['cust_id'];
							$query = mysqli_query($link,"SELECT * FROM manage_order WHERE cust_id=$id ORDER BY order_date DESC");
							while($row = mysqli_fetch_assoc($query)){
								$oid = $row['order_id'];
								$order_price = $row['order_price'];
								$order_quantity = $row['order_quantity'];
								$book_id = $row['book_id'];
								$date = $row['order_date'];
								$status = $row['order_status'];
								$newDate = date("d-m-Y", strtotime($date));
								$sqli2 = mysqli_query($link,"SELECT * FROM book WHERE book_id='$book_id'");
								while ($row = mysqli_fetch_assoc($sqli2)) {
									$id = $row['book_id'];
									$image = $row['book_pic'];
									$title = $row['book_title'];
									$price = $row['book_price'];
									$desc = $row['book_desc'];

									$subTotal = $order_quantity * $price;
									$count += 1;
									echo "
										<tr>
											<td class='cart_img'><img src='image/$image?'></td>
											<td class='cart_text'>
												$title<input type='hidden' name='book_title' value='$title'>
											</td>
											<td class='cart_price'>$price<input class='iprice' type='hidden' name='order_price' value='$price'</td>
											<td class='cart_quantity'>$order_quantity</td>
											<td class='itotal' style='text-align: right; padding: 22px'>$subTotal</td>
											<td class='cart_stat'>$status</td>
										</tr>
									";
								}
							}
						}
					}
				}
				else{
					echo "
						<h3>Please login before viewing order(s)</h3>					";
				}
			?>
		</table>
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