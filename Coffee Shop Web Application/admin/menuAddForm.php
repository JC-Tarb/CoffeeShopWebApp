<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
	<title>Add Menu Item</title>
<link rel="stylesheet" type="text/css" href="../main1.css" />
</head>

<!-- the body section -->
<body>
<div class = "centerbox">
    <main>
        <h1>Add Product</h1>
		<div class="container">
			<form action="menuAdd.php" method="post"id="menu_add_form">

				<label>Product ID:</label>
				<input type="text" name="prodID"><br>

				<label>Product Code:</label>
				<input type="text" name="prodCode"><br>

				<label>Product Name:</label>
				<input type="text" name="prodName"><br>
				
				<label>Product Type:</label>
				<input type="text" name="prodType"><br>
				
				<label>Product Size:</label>
				<input type="text" name="prodSize"><br>
				
				<label>Product Price:</label>
				<input type="text" name="prodUnitPrice"><br>
				
				<label>Product QOH:</label>
				<input type="text" name="prodQOH"><br>
		</div>
		
		<div class="btn-group">
			<form action = "../index/index.php"> 
				<button class="button"type="submit" value="Submit">Add Product</button>
			</form>
		
			<form action = "index.php"> 
				<button class="button"type="submit" value="Submit">Admin Page</button>
			</form>
		
			<form action = "../index/index.php"> 
				<button class="button"type="submit" value="Submit">Logout</button>
			</form>
		</div>
            <br>
			
	<div id = "footer">
		<?php require_once("../inc/footer.php"); ?>
	</div>

</div>
</body>
</html>