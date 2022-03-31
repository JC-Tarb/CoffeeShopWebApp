<?php 

	require_once("../inc/db_Connect.php");

	// Get all products
	$query = 'SELECT * FROM products
			  ORDER BY prodID';
	$statement2 = $db->prepare($query);
	$statement2->execute();
	$products= $statement2->fetchAll();
	$statement2->closeCursor();
	
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Coffee Shop</title>
    <link rel="stylesheet" type="text/css" href="../main1.css" />
</head>

<!-- the body section -->
<body>
	<div class=centerbox>
		<h1>Product Manager</h1>
		<h2>Product List</h2>
	
	     <!-- display a table of products -->
        <table>
            <tr>
				<th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($products as $product) : ?>
            <tr>
				<td><?php echo $product['prodID']; ?></td>
                <td><?php echo $product['prodCode']; ?></td>
                <td><?php echo $product['prodName']; ?></td>
                <td><form action = "updateProductsForm.php" method="post">
                    <input type="hidden" name="prodID"
                           value="<?php echo $product['prodID']; ?>">
                    <input type="submit" value="Update">
					</form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
	
	<div class = btn-group>
		<div class = centerbox>
			<form action ="index.php?">
				<button class ="button" type="submit" value="Submit">Return to Admin Page</button>
			</form>
		</div>
	</div>
</body>
<footer>
    <div id = "footer">
		<?php require_once("../inc/footer.php"); ?>
	</div>   
</footer>

</html>	