<?php

	//fetch inputs
	$prodID = filter_input(INPUT_POST, 'prodID', FILTER_VALIDATE_INT);
	$prodName = filter_input(INPUT_POST, 'prodName');
	$prodCode = filter_input(INPUT_POST, 'prodCode');
	$prodType = filter_input(INPUT_POST, 'prodType');
	$prodSize = filter_input(INPUT_POST, 'prodSize');
	$prodUnitPrice = filter_input(INPUT_POST, 'prodUnitPrice', FILTER_VALIDATE_FLOAT);
	$prodQOH = filter_input(INPUT_POST, 'prodQOH', FILTER_VALIDATE_INT);

	//validate inputs
	if ($prodID === null || $prodID === false || 
        $prodName === null || $prodName === false || 
        $prodCode === null || $prodCode === false||
		$prodType === null || $prodType === false ||
		$prodSize === null || $prodSize === false ||
		$prodUnitPrice === null || $prodUnitPrice === false || 
		$prodQOH === null || $prodQOH === false) 
	{
    $error = "Invalid product data. Check all fields are correct and try again.";
    echo $error;
	} 
	else  //once validation passes
	{ 
		require_once('../inc/db_Connect.php');

		$query = 'UPDATE products
					 SET prodID = :prodID, 
					 prodName = :prodName, 
					 prodCode = :prodCode, 
					 prodType = :prodType,
					 prodSize = :prodSize, 
					 prodUnitPrice = :prodUnitPrice,
					 prodQOH =:prodQOH
					 WHERE prodID =:prodID';		 
		$statement = $db->prepare($query);
		$statement->bindValue(':prodID', $prodID);
		$statement->bindValue(':prodName', $prodName);
		$statement->bindValue(':prodCode', $prodCode);
		$statement->bindValue(':prodType', $prodType);
		$statement->bindValue(':prodSize', $prodSize);
		$statement->bindValue(':prodUnitPrice', $prodUnitPrice);
		$statement->bindValue(':prodQOH', $prodQOH);
		$statement->execute();
		$statement->closeCursor();
		
		// Display the Product List page
		echo "<b>Update successful! :)</b>";
		include('viewProducts.php');
	}	
?>