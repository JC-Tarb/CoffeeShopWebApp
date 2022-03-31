<?php
	include("../inc/header.php");
	session_start();

	//create variables to store the values
	$subtotal = 0.00;
	$taxRate = 0.06;
	$taxAmount = 0.00;
	$total = 0.00;

	$action = filter_input(INPUT_POST, 'action');

	//When the action in one of the forms is "Remove Item," the selected item will be removed from the cart.
	if($action == "Remove Item") 
	{
		$prodID = filter_input(INPUT_POST, 'prodID');

		foreach($_SESSION["cart"] as $key => $value)
		{
			if($key == $prodID) 
			{
				unset($_SESSION["cart"][$key]);
			}
		
		}
	}

	//When the action in one of the forms is "Pay the Full Amount" or "Empty Cart," 
	//this step assumes the user has paid the total amount in full,
	//and removes all the items in the cart and take the user to "emptyCart" page.
	if($action == "Pay the Full Amount" OR $action == "Empty Cart") 
	{
		include_once("emptyCart.php");
		exit;
	} 
?>

<div class="centerbox">
<!-- the body section -->
	<header><h1>Items Currently in Your Cart </h1></header>
	<main>
		<br>
		<?php if(empty($_SESSION["cart"])) { ?>
		 <h1> Your Cart is empty ! </h1>
		<?php } else { ?>
			
			<table>
				<tr>
					<th width="10%">Product </th>
					<th width="10%">Discription</th>
					<th width="10%"> Quantity </th>
					<th>Total Price</th>
				</tr>
			
				<?php foreach ($_SESSION["cart"] as $key=>$item): ?>
			
				<tr>
					<form action = "viewCart.php" method="post">
						<td width="10%" > <?php echo $item["prodName"] ; ?> </td>
						<td width="12%"> <?php echo $item["prodType"];?> </td>
						<td width="10%"><?php echo $item["quantity"];?> </td>
						<td width="15%" style = "color:navy;"><b>$<?php echo number_format($item["itemTotalPrice"], 2);?> </b></td>
				
						<td><b>
							<input type="hidden" name = "prodID" value="<?php echo $key;?>">
							<input type="hidden" name = "prodName" value="<?php echo $item["prodName"];?>">
							<input type="hidden" name = "listPrice" value="<?php echo $item["prodUnitPrice"];?>">
							<input type="hidden" name = "quentity" value="<?php echo $item["quantity"] ;?>">
							<input type="submit" style = "border: none; font-weight: 900;" name = "action" value="Remove Item"> </b>
						</td>
					</form>
				</tr>
			
				<?php 
					if($item["itemTotalPrice"] != 0)
					{
						$subtotal = $subtotal + $item["itemTotalPrice"];  
					}
					endforeach; 
				?>
			</table>
			
		<?php }
				  $taxAmount = $subtotal * $taxRate;
				  $total = $subtotal + $taxAmount;
		 ?>
			<p><b>Subtotal: $<?php echo number_format($subtotal, 2);?></b></p>
			<p><b>Tax: $<?php echo number_format($taxAmount, 2);?></b></p>
			<p><b>Total Due: $<?php echo number_format($total, 2);?></b></p>
			
			<div class=centerbox>
				<div class=btn-group>
					<form action = "viewCart.php" method="post">
						 <button><input type="submit" name = "action" value="Pay the Full Amount">
					</form></button>
					
					<form action = "viewCart.php" method="post"> 
						<button><input type="submit" name = "action" value="Empty Cart"></button> 
					</form>
				</div>
			</div>
	</main>
</div>
		<?php require_once("../inc/footer.php"); ?>
