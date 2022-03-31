<?php

	if(!isset($prodID))
	{
		$prodID = filter_input(INPUT_POST, 'prodID');

		if($prodID == null)
		{
			$error = "Error";
			echo $error;
		}
		else 
		{
			require('../inc/db_Connect.php');

			$queryProducts = 'SELECT * FROM products
							  WHERE prodID = :prodID';		   
			$statement1 = $db->prepare($queryProducts);
			$statement1->bindValue(':prodID', $prodID);
			$statement1->execute();
			$product = $statement1->fetch();
			$statement1->closeCursor();
		}
	}

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Coffee Shop</title>
    <link rel="stylesheet" type="text/css" href="../main1.css">
</head>

<!-- the body section -->
<body>
<div class=centerbox>
    <header><h1>Product Manager</h1></header>
    <main>
		<h2>Update Product</h2>
		<form action="updateProduct.php" method="post" id="update_product_form">
			<table>
				<tr>           
					<td> <label>Product ID:</label>
						<input type="text" name="prodID" value="<?php echo $product["prodID"];?>" ><br>
					</td>
				</tr>
				
				<tr>           
					<td><label>Product Code:</label>
						<input type="text" name="prodCode" value="<?php echo $product["prodCode"];?>" ><br>
					</td>
				</tr>
				
				<tr>           
					<td><label>Product Name:</label>
						<input type="text" name="prodName" value="<?php echo $product["prodName"];?>"><br>
					</td>
				</tr>
				
				<tr>           
					<td> <label>Product Type:</label>
						<input type="text" name="prodType" value="<?php echo $product["prodType"];?>"><br>
					</td>
				</tr>
				
				<tr>           
					<td><label>Product Size:</label>
						<input type="text" name="prodSize" value="<?php echo $product["prodSize"];?>"><br>
					</td>
				</tr>
				
				<tr>           
					<td><label>Product Price:</label>
						<input type="text" name="prodUnitPrice" value="<?php echo $product["prodUnitPrice"];?>"><br>
					</td>
				</tr>
				
				<tr>
					<td><label>Product QOH:</label>
						<input type="text" name="prodQOH" value="<?php echo $product["prodQOH"];?>"><br>
					</td>
				</tr>
			
			</table>

			<div class=btn-group>
				<button><input type="submit" value="Update Product"></button>
			</div>
        </form>
		   
		<form action ="../admin/viewProducts.php" method = "get" id = "index form">
			<button class ="button" type="submit" value="Submit">Go Back</button>
		</form>
</div>
	</main>

<footer>
    <div id = "footer">
		<?php require_once("../inc/footer.php"); ?>
	</div> 
</footer>
</body>
</html>	