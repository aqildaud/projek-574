<?php
include 'config.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['Mod_Quantity'])){
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['book_id']==$_POST['book_id']) {
				$_SESSION['cart'][$key]['quantity']=$_POST['Mod_Quantity'];
				echo "<script>
					window.location.href='cart.php';
					</script>";
			}
		}
	}
	if(isset($_POST['remove'])){
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['book_id']==$_POST['book_id']) {
				unset($_SESSION['cart'][$key]);
				$_SESSION['cart']=array_values($_SESSION['cart']);
				echo "
					<script>
						alert('Book Removed');
						window.location.href='cart.php';
					</script>
				";
			}
		}
	}
}