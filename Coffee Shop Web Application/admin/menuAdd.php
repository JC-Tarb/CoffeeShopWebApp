<?php

	require("../inc/db_Connect.php");
	// gets the input from the add form
	$prodID = filter_input(INPUT_POST, 'prodID');
	$prodCode = filter_input(INPUT_POST, 'prodCode');
	$prodName = filter_input(INPUT_POST, 'prodName');
	$prodType = filter_input(INPUT_POST, 'prodType');
	$prodSize = filter_input(INPUT_POST, 'prodSize');
	$prodUnitPrice = filter_input(INPUT_POST, 'prodUnitPrice');
	$prodQOH = filter_input(INPUT_POST, 'prodQOH');
	
	// validation 
	if ($prodID == null || 
		$prodCode == null ||
		$prodName == null ||
		$prodType ==null || 
		$prodSize == null || 
		$prodUnitPrice == null ||
		$prodQOH == null ) 
	{
		$error = "Invalid  data. Check all fields and try again.";
		echo $error;
		include('menuAddForm.php');	
	}
	else // inserts and updates
	{	  
		// Add the product to the database  
		$queryInsertProduct = 'INSERT INTO products
									(prodID, prodCode, prodName, prodType, prodSize, prodUnitPrice, prodQOH)
								VALUES
									(:prodID, :prodCode, :prodName, :prodType, :prodSize, :prodUnitPrice, :prodQOH)';
		$statement2 = $db->prepare($queryInsertProduct);	
		$statement2->bindValue(':prodID', $prodID);
		$statement2->bindValue(':prodCode', $prodCode);
		$statement2->bindValue(':prodName', $prodName);
		$statement2->bindValue(':prodType', $prodType);
		$statement2->bindValue(':prodSize', $prodSize);
		$statement2->bindValue(':prodUnitPrice', $prodUnitPrice);
		$statement2->bindValue(':prodQOH', $prodQOH);
		$statement2->execute();
		$lastCust = $db->lastInsertId();
		$statement2->closeCursor();

		include('index.php');	
	}
	
?>
