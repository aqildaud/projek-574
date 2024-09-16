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
		img{
			max-height: 95px;
		}
		.container{
			width: 60%;
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
		button{
			border: none;
			padding: 0;
			text-decoration: none;
		}
		.btn_remove{
			background-color: unset !important;
			color: darkgreen;
		}
		.btn_remove:hover{
			opacity: 0.5;
		}
		a{
			text-decoration: none;
			color: black;
		}
		.btn_check{
			background-color: #4d5e55;
			color: white;
			padding: 10px;
			border-radius: 3px;
		}
		.btn_check:hover{
			opacity:  0.5;
		}
		.btn_con{
			background-color: unset;
			color: black;
			padding: 10px;
			border-radius: 3px;
		}
		.btn_con:hover{
			opacity: 0.5;
		}
	</style>
</head>
<body>
	<?php include 'navbar.php' ?>
	<?php 
			if (isset($_POST['submit'])) {
				if (isset($_SESSION['cart'])) {
					$myitems=array_column($_SESSION['cart'], 'book_id');
					if (in_array($_POST['book_id'], $myitems)) {
						echo "
							<script>
								alert('Item is already added');
								window.location.href='index.php';
							</script>
						";
					}
					else{
						$count=count($_SESSION['cart']);
						$_SESSION['cart'][$count]=array('book_id' =>$_POST['book_id'], 'book_pic' =>$_POST['book_pic'], 'book_title' =>$_POST['book_title'], 'book_price' =>$_POST['book_price'], 'quantity'=>$_POST['cart_quantity'], 'stock'=>$_POST['book_stock']);
					}	
				}else{
					$_SESSION['cart'][0]=array('book_id' =>$_POST['book_id'], 'book_pic' =>$_POST['book_pic'], 'book_title' =>$_POST['book_title'], 'book_price' =>$_POST['book_price'], 'quantity'=>$_POST['cart_quantity'], 'stock'=>$_POST['book_stock']);
					echo "
						<script>
							alert('Item added');
							window.location.href='index.php';
						</script>
					";
				}
			}
	?>
	<div class="container">
		<h2>My Cart</h2>
	<table>
		<tr>
			<td colspan="2">Product</td>
			<td class="cart_price">Price</td>
			<td class="cart_quantity">Quantity</td>
			<td class="cart_total" style="text-align: right;">Total</td>
		</tr>
		<?php
			if (isset($_SESSION['cart'])) {
				foreach ($_SESSION['cart'] as $key => $value){
					$query = mysqli_query($link,"SELECT * FROM book WHERE book_id=$value[book_id]");
					$row = mysqli_fetch_assoc($query);
					$stock = $row['book_stock'];
					echo "
						<input type='hidden' name='book_id' value='$value[book_id]'>
						<tr>
							<td class='cart_img'><img src='image/$value[book_pic]?>''></td>
							<td class='cart_text'>
								$value[book_title]<input type='hidden' name='book_title' value='$value[book_title]'><br>
								<form action='manage_cart.php' method='POST'>
									<button name='remove' class='btn_remove'>REMOVE</button>
									<input type='hidden' name='book_id' value='$value[book_id]'>
								</form>		
							</td>
							<td class='cart_price'>$value[book_price]<input class='iprice' type='hidden' name='order_price' value='$value[book_price]'</td>
							<td class='cart_quantity'>
								<form action='manage_cart.php' method='POST'>
									<input class='iquantity' type='number' name='Mod_Quantity' onchange='this.form.submit()' min='1' max='$stock' value='$value[quantity]'>
									<input type='hidden' name='book_id' value='$value[book_id]'>
								</form>
							</td>
							<td class='itotal' style='text-align: right; padding: 22px'></td>
						</tr>
					";
				}
				echo "
				<tr>
					<td class='cart_total2' colspan='5' style='text-align: right;' id='gtotal'></td>
				</tr>
				<tr>
					<td colspan='2'></td>
					<td colspan='2'>
						<button class='btn_con'><a href='index.php'>CONTINUE SHOPPING</a></button>
					</td>
					<td>
						<form action='manage_order.php' method='POST'>
							<button name='checkout' class='btn_check'>CHECKOUT</button>
						</form>
					</td>
				</tr>
				</form>";
			}
		?>
	</table>
	</div>
	<script type="text/javascript">
		var gt = 0;
		var iprice = document.getElementsByClassName("iprice");
		var iquantity = document.getElementsByClassName("iquantity");
		var itotal = document.getElementsByClassName("itotal");
		var gtotal = document.getElementById("gtotal");

		function subTotal(){
			gt = 0;
			for(i=0;i<iprice.length;i++){
				itotal[i].innerText=(iprice[i].value) * (iquantity[i].value);
				gt += (iprice[i].value) * (iquantity[i].value);
			}
			gtotal.innerText=gt;
		}
		subTotal();
	</script>
</body>
</html>