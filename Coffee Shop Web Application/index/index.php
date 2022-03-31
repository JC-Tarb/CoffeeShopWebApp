<?php 

	//starting page of the whole cafe website
	//load "header.php" file page first
	include("../inc/header.php");
	
?>
<!-- Since this is the extension of "header.php" file, many starting tags are omitted, per W3C validation result-->
	<div class = "centerbox">
		<p>Kaibur Cafe brings you freshly brewed coffee & delicious bakery items daily!</p>
		<p>Store Address: 14 Anytown, Anystate USA 99999</p> 
		<p>Store Hours: 7:00 am - 7:00 pm </p>
		<p>Telephone: 724-000-0000</p>
		<img src = "../pictures/Pouring_coffee.jpg" alt = "Pouring coffee">

		<p>
			<b>Today's hot deals:</b> (see below) 
			<br>
			<br>Fresh brewed coffee: <b>$1.75</b>
			<br>Chai Latte: <b>$3.35</b>
			<br>Iced Tea: <b>$2.95</b>
			<br>Cinnamon Roll: <b>$3.75</b>
			<br> <i>*We accept all major credit cards.</i> 
		</p>
	</div>
	<?php require_once("../inc/footer.php"); ?>
		

