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
		<?php include 'navbarAdmin.css'; ?>
		.container{
			width: 60%;
			margin: 100px auto;
		}
		.container input[type=number]{
			width: 80%;
		}
		.container2{
			width: 60%;
			margin: 100px auto;
			text-align: center;
			border-bottom: 2px solid darkgreen;
		}
		table{
			text-align: left;
		}
		th,td{
			border: 1px solid #ddd;
  			padding: 8px;
		}
		#book th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #4d5e55;
		  color: white;
		  border: none;
		}
		#book{
			border-collapse: collapse;
		}
		.container2 input[type=text], input[type=number]{
			width: 40%;
			padding: 5px 3px;
			font-family: candara;
			margin-bottom: 20px;
			font-size: 16px;
			background-color: #343434;
			color: lightgrey;
			border: 1px solid lightgrey;
		}
		.container2 select{
			width: 41%;
			margin-bottom: 20px;
			padding: 5px 3px;
			font-family: candara;
			font-size: 16px;
			background-color: #343434;
			color: lightgrey;
			border: 1px solid lightgrey;
		}
		.container2 textarea{
			width: 40%;
			font-family: candara;
			font-size: 12px;
			background-color: #343434;
			color: lightgrey;
			border: 1px solid lightgrey;
		}
		.container2 label{
			float: left;
			margin-left: 335px;
		}
		.container2 input[type=submit]{
			padding: 10px 35px;
			margin-top: 20px;
			margin-bottom: 75px;
			background-color: #343434;
			color: lightgrey;
			border: 1px solid lightgrey;
			border-radius: 5px;
		}
		.container2 input[type=file]{
			width: 41%;
			padding: 5px 3px;
			font-family: candara;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<?php include 'navbarAdmin.php'; ?>
	<div class="container2">
		<form action="manage_book.php" method="POST" id="keyin" enctype="multipart/form-data">
			<h1>Add Book</h1>
			<label>Title</label><br>
			<input type="text" name="book_title"><br>
			<label>Year Published</label><br>
			<input type="text" name="book_year"><br>
			<label>Category</label><br>
			<select name="book_category">
				<option>Select...</option>
				<option value="Fiction">Fiction</option>
				<option value="Non-Fiction">Non-Fiction</option>
				<option value="Literature">Literature</option>
				<option value="History">History</option>
				<option value="Art">Art</option>
				<option value="Philosophy">Philosophy</option>
			</select><br>
			<label>Price(RM)</label><br>
			<input type="text" name="book_price"><br>
			<label>Picture</label><br>
			<input type="file" name="file"><br>
			<label>Quantity</label><br>
			<input type="number" name="book_stock" min="1"><br>
			<label>Description</label><br>
			<textarea name="book_desc" rows="3"></textarea><br>
			<input type="submit" name="submit" value="Add">
		</form>
	</div>
	<?php
		if(isset($_POST['submit'])){
			$title = $_POST['book_title'];
			$categ = $_POST['book_category'];
			$price = (float) $_POST['book_price'];
			$stock = (int) $_POST['book_stock'];
			$year = (int) $_POST['book_year'];
			$desc = $_POST['book_desc'];
			
			$file = $_FILES['file'];
			$tname = $_FILES['file']['tmp_name'];
			$pname = rand(1000,10000)."-".$_FILES['file']['name'];
			$upload_dir = "image/";
			move_uploaded_file($tname, $upload_dir.'/'.$pname);

			$sql1 = "SELECT * FROM book WHERE book_title='$title'";
			$result = mysqli_query($link, $sql1);
			if (mysqli_num_rows($result)>0) {
				echo "<p id='demo'></p>";
			}else{
				$query = "INSERT INTO book (book_title, book_category, book_price, book_pic, book_stock, book_desc, book_year) VALUES ('$title', '$categ', '$price', '$pname', '$stock', '$desc', '$year')";
				$result1 = mysqli_query($link, $query);
				if ($result1) {
					echo "
						<script>alert('Book added')</script>
					";
				}else{
					echo "ERROR";
				}
			}
		}
	?>
	<form method="POST" action="manage_book.php">
		<div class="container">
			<?php
			$ind = 0;
				echo "<table id='book'>";
				$query = mysqli_query($link,"SELECT * FROM book");?>
					<tr>
						<th>ID</th>
						<th style="width: 100%;">TITLE</th>
						<th>PRICE</th>
						<th>QUANTITY</th>
						<th>TOTAL SOLD</th>
					</tr><?php
				while($row = mysqli_fetch_assoc($query)){
					$id = $row['book_id'];
					$image = $row['book_pic'];
					$title = $row['book_title'];
					$price = $row['book_price'];
					$quantity = $row['book_stock'];
					$sold = $row['book_sold'];

					$ind += 1?>
						<tr>
							<td><?php echo "$ind";?><input type="hidden" name="book_id" value="<?php echo $id ?>"></td>
							<td><?php echo "$title";?></td>
							<td>RM<?php echo "$price";?></td>
							<td>
								<form method="POST">
									<?php echo "<input type='number' onchange='this.form.submit()' name='book_stock' value='$quantity'>";?>
									<?php echo "<input type='hidden' name='bid' value='$id'>";?>

								</form>
							</td>
							<td><?php echo "$sold";?></td>
						</tr><?php
				}echo "</table>";
			?>
			<?php 
				if(isset($_POST['book_stock'])) {
					$id = $_POST['bid'];	
					$q = $_POST['book_stock'];
					$sql = mysqli_query($link, "UPDATE book SET book_stock=$q WHERE book_id=$id");
					echo "<script>location = location</script>";
				}
			?>
		</div>
	</form>
</body>
</html>