<?php
	include 'config.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Products - Merak Kayangan</title>
	<style type="text/css">
		body{
			margin: 0;
			background-color: white;
			font-family: candara;
		}
		<?php include 'navbar.css' ?>
		.book img{
			max-height: 195px;
		}
		.container{
			max-width: 1200px;
			margin: auto;
			font-size: 15px;
			margin-top: 100px;
			padding-right: 55px;
			padding-left: 55px;
			font-family: Times New Roman;
		}
		.book{
			display: inline-block;
			list-style: none;
			box-sizing: border-box;
			text-align: center;
			margin-left: 45px;
			margin-right: 45px;
			margin-bottom: 45px;
			width: 25%;
		}
		.book:hover{
			opacity: 0.5;
		}
		.book a{
			text-decoration: none;
		}
		.toolbar{
			margin-bottom: 50px;
		}
		.toolbar p{
			display: inline;
			margin-left: 450px;
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
	</style>
</head>
<body>
	<?php include 'navbar.php'?>
	<div class="container">
		<div class="toolbar">
			<form method="POST" action="catalog.php">
				<select onchange="this.form.submit()" name="selcat">
					<option value="">Filter</option>
					<option value="all">All Products</option>
					<option value="Fiction">Fiction</option>
					<option value="Non-Fiction">Non-Fiction</option>
					<option value="Literature">Literature</option>
					<option value="History">History</option>
					<option value="Art">Art</option>
				</select>
				<?php 
					$count = 0;
					if (isset($_POST['selcat'])) {
						$sel = $_POST['selcat'];
						if ($sel=="all" or $sel=="") {
							$query1 = mysqli_query($link,"SELECT * FROM book");
						}
						else{
							$query1 = mysqli_query($link,"SELECT * FROM book WHERE book_category='$sel'");
						}
						while($row = mysqli_fetch_assoc($query1)){
							$count += 1;
						}
					}
					else{
						$query2 = mysqli_query($link,"SELECT * FROM book");
						while($row = mysqli_fetch_assoc($query2)){
							$count += 1;
						}
					}
				?>
				<p><?php echo $count?> Products</p>
			</form>
		</div>
		<?php
			if (isset($_POST['selcat'])) {
				$sel = $_POST['selcat'];
				if ($sel=="all") {
					$query1 = mysqli_query($link,"SELECT * FROM book");
				}
				else{
					$query1 = mysqli_query($link,"SELECT * FROM book WHERE book_category='$sel'");
				}	
				while($row = mysqli_fetch_assoc($query1)){
					$id = $row['book_id'];
					$image = $row['book_pic'];
					$title = $row['book_title'];
					$price = $row['book_price']; 
					$stock = $row['book_stock']; ?>
					<div class="book">
						<?php echo "<a href='products.php?id=$id'>"; ?>
							<img src="image/<?php echo $image ?>">
						</a>
						<?php 
							if ($stock == 0) {
								echo "<div class='grid-text'><p><span style='font-size: 15px; font-weight: 700;'>$title</span><br>Sold Out </p></div>";
							}
							else{
								echo "<div class='grid-text'><p><span style='font-size: 15px; font-weight: 700;''>$title</span><br>RM $price</p></div>";
							}
						?>
					</div><?php
				}
			}
			else{
				$query = mysqli_query($link,"SELECT * FROM book");
				while($row = mysqli_fetch_assoc($query)){
					$id = $row['book_id'];
					$image = $row['book_pic'];
					$title = $row['book_title'];
					$price = $row['book_price']; 
					$stock = $row['book_stock']; ?>
					<div class="book">
						<?php echo "<a href='products.php?id=$id'>"; ?>
							<img src="image/<?php echo $image ?>">
						</a>
						<?php 
							if ($stock == 0) {
								echo "<div class='grid-text'><p><span style='font-size: 15px; font-weight: 700;'>$title</span><br>Sold Out </p></div>";
							}
							else{
								echo "<div class='grid-text'><p><span style='font-size: 15px; font-weight: 700;''>$title</span><br>RM $price</p></div>";
							}
						?>
					</div><?php
				}
			}
		?>
	</div>
</body>
</html>