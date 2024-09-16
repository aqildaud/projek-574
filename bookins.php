<?php
	include 'config.php';
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
			font-size: 15px;		}
		#icon{
			width: 20px;
			height: 20px;
			vertical-align: middle;
			margin-left: 25px;
		}
		#logo{
			width: 50px;
			height: 50px;
			vertical-align: middle;
			margin-right: 1100px;
		}
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
		.regcon input[type=number]{
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
	<div class="navbar">
		<a href="index.php"><img id="logo" src="image/ahgase3.png"></a>
		<a href="catalog.php">Catalog</a>
		<a href="login.php"><img id="icon" src="image/user.png"></a>
	</div>
	<form action="bookins.php" method="POST" id="keyin">
		<div class="regcon">
			<h1>Add Book</h1>
			<label>Title</label><br>
			<input type="text" name="book_title"><br>
			<label>Category</label><br>
			<input type="text" name="book_category"><br>
			<label>Price(RM)</label><br>
			<input type="text" name="book_price"><br>
			<label>Picture</label><br>
			<input type="text" name="book_pic"><br>
			<label>Quantity</label><br>
			<input type="number" name="book_stock"><br>
			<label>Description</label><br>
			<textarea name="book_desc"></textarea>
			<input type="submit" name="submit" value="Add">
		</div>
	</form>
	<?php
		if(isset($_POST['submit'])){
			$title = $_POST['book_title'];
			$categ = $_POST['book_category'];
			$price = (float) $_POST['book_price'];
			$pic = $_POST['book_pic'];
			$stock = (int) $_POST['book_stock'];
			$desc = $_POST['book_desc'];

			$sql1 = "SELECT * FROM book WHERE book_title='$title'";
			$result = mysqli_query($link, $sql1);
			if (mysqli_num_rows($result)>0) {
				echo "<p id='demo'></p>";
			}else{
				$query = "INSERT INTO book (book_title, book_category, book_price, book_pic, book_stock, book_desc) VALUES ('$title', '$categ', '$price', '$pic', '$stock', '$desc')";
				$result1 = mysqli_query($link, $query);
				if ($result1) {
					echo "<br><br>Book has been added";
				}else{
					echo "ERROR";
				}
			}
		}
	?>
	<script type="text/javascript">
		window.onload = function() {
  			document.getElementById('keyin').reset();
  		}
	</script>
</body>
</html>