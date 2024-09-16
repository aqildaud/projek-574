<?php
	include 'config.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		<?php 
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$query = mysqli_query($link,"SELECT * FROM book WHERE book_id=$id");
				while ($row = mysqli_fetch_assoc($query)) {
					$title = $row['book_title'];
					echo $title;
				}
			}
		?>
	</title>
	<style type="text/css">
		body{
			margin: 0;
			background-color: white;
			font-family: candara;
		}
		<?php include 'navbar.css' ?>
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
		.grid{
			width: 55%;
			height: 720px;
			margin: 200px auto;
			margin-top: 100px;
			font-family: garamond;
		}
		.grid_image{
			width: 50%;
			float: left;
			top: 600.377px;
			left: 538.066;
		}
		.grid_image img{
			max-height: 500px;
		}
		.grid img, p{
			display: inline-block;
			float: left;
			font-family: candara;
			font-weight: 400;
		}
		.grid_detail{
			float: left;
			width: 50%;
		}
		.grid h2, h1, h3{
			line-height: 0.8;
		}
		.grid_detail input[type=submit]{
			width: 60%;
			padding: 10px 20px 10px 20px;
			background-color: #4d5e55;
			border: none;
			border-radius: 2px;
			color: white;
			font-weight: bold;
		}
		.grid_detail input[type=number]{
			width: 51.5%;
			padding: 10px 20px 10px 20px;
			margin-bottom: 20px;
		}
		#test{
			opacity: 0.5;
		}
		h4{
			color: grey;
			font-family: candara;
		}
	</style>
</head>
<body>
	<?php include 'navbar.php' ?>
	<?php
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = mysqli_query($link,"SELECT * FROM book WHERE book_id=$id");
			while($row = mysqli_fetch_assoc($query)){
				$id = $row['book_id'];
				$image = $row['book_pic'];
				$title = $row['book_title'];
				$price = $row['book_price'];
				$stock = $row['book_stock'];
				$desc = $row['book_desc']?>
				<div class="grid">
					<div class="grid_image">
						<img src="image/<?php echo $image;?>">
					</div>
					<div class="grid_detail">
						<h1><?php echo $title;?></h1>
						<?php 
							if($stock==0){
								echo "<h2>Sold Out </h2><br>
									<input id='test' type='submit' name='submit' value='ADD TO CART' disabled>
								";
							}
							else{
								echo "<h2>RM $price </h2>
									<h4>Stock: $stock</h4>
									<form method='POST' action='cart.php'>
										<input type='hidden' name='book_stock' value='<?php echo $stock ?>'>
										<input type='hidden' name='book_id' value='$id'>
										<input type='hidden' name='book_pic' value='$image'>
										<input type='hidden' name='book_title' value='$title'>
										<input type='hidden' name='book_price' value='$price'>
										<input type='hidden' name='cart_quantity' value='1'>
										<input type='submit' name='submit' value='ADD TO CART'>
									</form>
								";

							}
						?>
						<p><?php echo $desc?></p>
					</div>	
				</div><?php
			}
		}
	?>
</body>
</html>