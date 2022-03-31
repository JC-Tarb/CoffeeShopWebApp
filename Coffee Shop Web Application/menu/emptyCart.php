<?php
	include_once("../inc/header.php");

	//session_start();
	if(!empty($_SESSION["cart"]))
	{
		unset($_SESSION['cart']);
	}
?>
	<main>
		<?php if(empty($_SESSION["cart"])) { ?>
		<div class=centerbox> 
		<h1> Your Cart is now empty ! </h1>
		<h2>Thanks for your business. Please come again!</h2>
		<?php } ?>
	</main>
	<div class=centerbox>
		<div class="btn-group">
			<form action ="index.php">
				<button class="button"type="submit" value="Submit">Keep Shopping</button>
			</form>
		</div>
	</div>
		<?php require_once("../inc/footer.php"); ?>