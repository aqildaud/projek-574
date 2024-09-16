<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
		if(isset($_GET['id'])){
			echo "
				<script type="text/javascript">
					alert('Status Updated');
					window.location.href='view_order.php?id=$id';
				</script>
			";
		}
	?>
</body>
</html>