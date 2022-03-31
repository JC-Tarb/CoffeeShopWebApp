<?php
	$errorMessage = "Invalid value, Please re-enter the quantity.";
	$quantity = filter_input(INPUT_POST, 'quantity');
	$prodID = filter_input(INPUT_POST, 'prodID');
	$prodName = filter_input(INPUT_POST, 'prodName');
	$prodUnitPrice= filter_input(INPUT_POST, 'prodUnitPrice');
	$prodType = filter_input(INPUT_POST, 'prodType');
	$prodSize = filter_input(INPUT_POST, 'prodSize');

	session_start();
	
	//validate the user input
	if(!is_numeric($quantity) OR $quantity < 0 ) 
	{
		echo '<b><p style = "color:red;"> ' . $errorMessage . '</b></p>';
		include("index.php");
		exit;
	} 
	else
	{
		$itemTotalPrice = (float)$prodUnitPrice * $quantity;

		$item = array( "prodName" => $prodName,
					   "prodType"=> $prodType,
					   "quantity" => $quantity,
					   "prodUnitPrice" => $prodUnitPrice,
					   "itemTotalPrice" => $itemTotalPrice,
					   "prodSize" =>$prodSize);

		if(empty($_SESSION["cart"]))
		{ 
			$_SESSION["cart"] = array();
		}

		$_SESSION["cart"][$prodID] = $item;
		include("index.php");
	}
?>