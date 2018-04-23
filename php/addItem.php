<?php

	if(!isset($_POST['itemName'])&&!isset($_POST['itemPrice'])&&!isset($_POST['itemDescription'])&&!isset($_POST['itemQuantity'])&!isset($_POST['itemImage'])) {
		die();
	}
	else
	{
		session_start();
		require "db.php";
		$itemName = $_POST['itemName'];
		$itemPrice = $_POST['itemPrice'];
		$itemDescription = $_POST['itemDescription'];
		$itemQuantity = $_POST['itemQuantity'];
		$itemImage = $_POST['itemImage'];
		
		$sql = "INSERT INTO items VALUES (null, \"$itemName\", \"$itemPrice\", \"$itemDescription\", \"$itemImage\", \"$itemQuantity\")";
		if ($conn->query($sql) === TRUE) 
		{
			echo "ok";
		} else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}
?>