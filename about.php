<?php 
	include 'config.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>About Us - Merak Kayangan</title>
	<style type="text/css">
		<?php include 'navbar.css'; ?>
		body{
			margin: 0;
			background-color: white;
			font-family: candara;
		}
		.container{
			max-width: 920px;
			margin: auto;
			font-size: 15px;
			margin-top: 100px;
			padding-right: 55px;
			padding-left: 55px;
			font-family: Times New Roman;
		}
		.toolbar{
			margin-bottom: 50px;
		}
		.toolbar p{
			display: inline;
			margin-left: 450px;
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
		.container h1{
			font-family: Garamond;
			text-align: center;
			margin-bottom: 50px;
		}
		.container p{
			font-family: candara;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<?php include 'navbar.php' ?>
	<div class="container">
		<h1>About Us</h1>
		<p>Merak Kayangan is an independent bookshop founded in 2018 in a small town Kota Bharu before moving to Kuala Lumpur. Merak Kayangan specialized in books of humanities; literature, philosophy, history, arts and others. We are serious in promoting important books that are worth reading. </p>
	</div>
</body>
</html>