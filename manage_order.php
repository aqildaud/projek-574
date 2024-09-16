<?php 
include 'config.php';
session_start();


if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['checkout'])){
		if(!isset($_SESSION['cust_email'])){
			echo "
			<script>
				alert('Please login before proceeding to checkout');
				window.location.href='loginUser.php';
			</script>
			";
		}
		else{
			$sql1 = "SELECT * FROM customer WHERE cust_email='$_SESSION[cust_email]'";
			$result = mysqli_query($link, $sql1);
			while($row = mysqli_fetch_assoc($result)){
				$id = $row['cust_id'];
			}
			$order_id=mysqli_insert_id($link);
				$query1 = "INSERT INTO manage_order(order_id, order_price, order_quantity, book_id, cust_id) VALUES (?,?,?,?,?)";
				$stmt=mysqli_prepare($link,$query1);
				if($stmt){
					mysqli_stmt_bind_param($stmt,"iiiii",$order_id, $book_price, $cart_quantity, $book_id, $cust_id);
						foreach ($_SESSION['cart'] as $key => $values) {
							$cart_quantity = $values['quantity'];
							$book_price = $values['book_price'];
							$book_id = $values['book_id'];
							$cust_id = $id;
							mysqli_stmt_execute($stmt);

							$query2 = mysqli_query($link,"UPDATE book SET book_stock=(book_stock - $cart_quantity) WHERE book_id=$book_id");
							$query3 = mysqli_query($link,"UPDATE book SET book_sold=(book_sold + $cart_quantity) WHERE book_id=$book_id");
							$query4 = mysqli_query($link,"UPDATE manage_order SET order_status='Order Placed' WHERE order_id=$order_id");

						}
						unset($_SESSION['cart']);
						echo"
							<script>
								alert('Order Placed');
								window.location.href='index.php';
							</script>
						";
				}
				else{
					echo "
						<script>
							alert('ERROR');
							window.location.href='cart.php';
						</script>
					";
				}
			
		}
	}
}

?>