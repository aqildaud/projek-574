<?php include 'config.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		<?php include 'navbarAdmin.css';?>
		.container{
			width: 60%;
			margin: 100px auto;
		}
		table{
			width: 100%;
			border-collapse: collapse;
		}
		td, th{
			text-align: left;
			border: 1px solid lightgrey;
			padding: 4px 6px;
		}
		#cid{
			width: 5%;
			text-align: center;
		}
		#cname{
			width: 55%;
		}
		#cno{
			width: 30%;
		}
		#cbtn{
			text-align: center;
		}
	</style>
</head>
<body>
	<?php include 'navbarAdmin.php'; ?>
	<div class="container">
		<h2>Customer</h2>
		<table>
			<tr>
				<th id="cid">ID</th>
				<th>Customer Name</th>
				<th>Phone Number</th>
				<th id="cbtn">Order(s)</th>
			</tr>
			<?php 
				$query1 = mysqli_query($link, "SELECT * FROM customer");
				while($row = mysqli_fetch_assoc($query1)){
					$name = $row['cust_username'];
					$id0 = $row['cust_id'];
					$phone = $row['cust_phone'];
					$address = $row['cust_address'];
					echo "
						<tr>
							<td id='cid'>$id0</td>
							<td id='cname'>$name</td>
							<td id='cno'>$phone</td>
							<td id=cbtn>
								<a href='view_order.php?id=$id0'><input type='submit' name='view' value='View'></a>
								<input type='hidden' name='cid' value='$id0'>
							</td>
						</tr>
					";
				}
			?>
		</table>
	</div>
</body>
</html>