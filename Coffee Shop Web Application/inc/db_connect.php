<div class = "centerbox">

	<?php
		$dsn1 = 'mysql:host=localhost;dbname=my_coffee_shop1';
		$username1 = 'root';
		$password1 = '';
	
		try 
		{
			$db = new PDO($dsn1, $username1, $password1);
			echo '<br>';
			//echo '<p> You are connected to the database.</p>';
		} 
		catch (PDOException $e) 
		{
			$error_message = $e->getMessage();
			echo  'Connection error.:$error_message';
		}
	?>

</div>