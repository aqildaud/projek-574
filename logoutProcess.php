<?php
	include 'config.php';
	session_start();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		if (isset($_POST['logoutA'])) {
			unset($_SESSION['admin_email']);
			header('location:loginAdmin.php');
		}
		if (isset($_POST['logoutC'])) {
			unset($_SESSION['cust_email']);
			header('location:loginUser.php');
		}
	}
?>