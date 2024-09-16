<?php include 'config.php'; session_start(); ?>
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
		img{
			max-height: 95px;
		}
		table{
			width: 100%;
			border-collapse: collapse;
		}
		td, th{
			text-align: left;
			border-bottom: 1px solid lightgrey;
			padding: 15px 6px;
		}
		#oq, #ototal, #ostat{
			text-align: center;
		}
		#otitle{
			font-weight: bolder;
			font-size: 18px;
		}
		#odate{
			font-size: 16px;
			font-weight: 900;
			color: #c0b096;
		}
	</style>
</head>
<body>
	<?php include 'navbarAdmin.php'; ?>
	<div class="container">
		<table>
			<tr>
				<th id="otitle">Title</th>
				<th id="oq">Quantity</th>
				<th id="ototal">Total Price</th>
				<th id="ostat">Status</th>
			</tr>
			<?php
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$query = mysqli_query($link, "SELECT * FROM manage_order WHERE cust_id=$id ORDER BY order_date DESC");
					while ($row = mysqli_fetch_assoc($query)) {
						$oid = $row['order_id'];
						$cid = $row['cust_id'];
						$bid = $row['book_id'];
						$date = $row['order_date'];
						$quantity = $row['order_quantity'];
						$price = $row['order_price'];
						$subTotal = $quantity * $price;
						$status = $row['order_status'];


						$sql = mysqli_query($link, "SELECT * FROM book WHERE book_id=$bid");
						while ($row = mysqli_fetch_assoc($sql)) {
							$image = $row['book_pic'];
							$title = $row['book_title'];
							$price1 = $row['book_price']; 
							$stock = $row['book_stock'];
						}

						echo "
							<tr>
								<td id='otitle'>$title<br><span id='odate'>Order Date: $date</span></td>
								<td id='oq'>$quantity</td>
								<td id='ototal'>$subTotal</td>
								<td id='ostat'>";?>
									<?php echo "<form method='POST'>"; ?>
										<select onchange='this.form.submit()' name='statusUpdate'>
											<option value='Preparing' <?php if($status=='Preparing'){ echo "selected";}?>>Preparing</option>
											<option value='Shipped out' <?php if($status=='Shipped out'){ echo "selected";}?>>Shipped out</option>
											<option value='Out for delivery' <?php if($status=='Out for delivery'){ echo "selected";}?>>Out for delivery</option>
											<option value='Delivered' <?php if($status=='Delivered'){ echo "selected";}?>>Delivered</option>
											<?php echo "<input type='hidden' name='order_id' value='$oid'>";?>
										</select>
									</form>
						<?php
						echo "</td>
							</tr>";
					}
				}
			?>
			<?php
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					if(isset($_POST['statusUpdate'])){
						$stat = $_POST['statusUpdate'];
						$oid = $_POST['order_id'];
							$sql1 = mysqli_query($link, "UPDATE manage_order SET order_status='$stat' WHERE order_id=$oid");	
							echo "<script>location = location</script>";
					}
				}
			?>
		</table>
	</div>
</body>
</html>