<?php 
	include 'config.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Merak Kayangan</title>
		<style type="text/css">
		<?php include 'navbar.css'; ?>
		body{
			margin: 0;
			background-color: white;
			font-family: candara;
		}
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
		.container h2{
			font-family: Garamond;
			text-align: center;
			margin-bottom: 50px;
		}
	</style>
</head>
<body>
	<?php 
		include 'navbar.php';
	?>
	<div class="container">
		<h2>FEATURED COLLECTION</h2>
		<?php 
			$query = mysqli_query($link,"SELECT * FROM book ORDER BY book_sold DESC");
				for ($i=0; $i<6; $i++) { 
					$row = mysqli_fetch_assoc($query);
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
		?>
	</div>
	<div class="container">
		<h2>LATEST COLLECTION</h2>
		<?php 
			$query = mysqli_query($link,"SELECT * FROM book ORDER BY book_year DESC");
				for ($i=0; $i<6; $i++) { 
					$row = mysqli_fetch_assoc($query);
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
		?>
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