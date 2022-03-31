<?php 
		
	//admin page
	include("../inc/header.php");
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/main1.css" />
</head>

<body>
	<div class = "centerbox">
		<div class="btn-group">
			<form action ="../admin/viewProducts.php" method = "get" id = "viewProducts">
				<button class="button"type="submit" value="Submit">View/Update Menu Item</button>
			</form>
		   
			<form action ="../admin/menuAddForm.php" method = "get" id = "add_form">
				<button class="button" type="submit" value="Submit">Add Menu Item</button>
			</form>
			
			<form action ="../index/index.php" method = "get" id = "index form">
				<button class ="button" type="submit" value="Submit">Logout</button>
			</form>
		</div>
	</div>
</body>
	<?php require_once("../inc/footer.php"); ?>
</html>