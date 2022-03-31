<?php 
//starting point for "Menu" 
//this page can be integrated into menuForm.php file
	
include_once("../inc/header.php");
require("../inc/db_Connect.php");

//Run a query and get the products table from the database, so we can use it for our PHP codes
$queryProducts ="SELECT prodID, prodName, prodType, prodUnitPrice, prodSize
				FROM products
				ORDER BY prodID;";
$statement = $db->prepare($queryProducts);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();

//After the query is done and stored, next step is display the menu page.
include('menuForm.php');
?>

