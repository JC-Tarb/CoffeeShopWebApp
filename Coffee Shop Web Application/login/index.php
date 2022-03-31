<?php 

	session_start();
	include("../inc/header.php");
	require("../inc/db_Connect.php");
	 

	if(!isset($username))
	{
		$username = filter_input(INPUT_POST,'username');
	}

	if(!isset($password))
	{
		$password = filter_input(INPUT_POST,'password');
	}
	
	$login = filter_input(INPUT_POST, 'login');

	if(isset($login))  
    {  
        if(empty($username) || empty($password))  
        {  
            $message = '<label>All fields are required</label>';  
        }  
		else
		{
			// Get the userName and passWord
			$query = 'SELECT emailAddress, password
					 FROM employees
					 WHERE emailAddress =:emailAddress AND password = :password';
			$statement = $db->prepare($query);
			$statement->bindValue(':emailAddress', $username);
			$statement->bindValue(':password', $password);
			$statement->execute();
			$login= $statement->fetch();
			$count = $statement->rowCount();
			$statement->closeCursor();
				
			if($count > 0)
			{
				//$validPassword = password_verify($password , $login['password']);
				//if($validPassword)
				//{
					$_SESSION["username"] = $username;
					header("location:../admin/index.php");
				//}
			}
			else
			{
				$message = '<label>Wrong Data, please re-enter username and password.</label>'; 
			}
		}  
	}
	
?>
<div class= centerbox>
	
	<br>
	<?php  
        if(isset($message))  
        {  
            echo '<label class="text-danger" style ="color:red"><b>'.$message.'</b></label>';  
		}  
    ?>
	
	<div class="container">
		<form action="index.php" method="post">
				<label for="username"><b>Admin Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" id = "username" required>			
				<br><br>
				<label for="password"><b>Admin Password </b></label>
				<input type="password" placeholder="Enter Password" name="password" id = "password" required>
				<br><br>
				
				<input type="submit" name="login" value="Submit" /> 
		</form>		
	</div>				
</div>
		<br><br>

<?php require_once("../inc/footer.php"); ?>