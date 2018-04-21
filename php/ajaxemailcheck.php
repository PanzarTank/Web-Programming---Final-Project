<?php
	session_start();
	require "db.php";
	$email = $_POST['email'];


	$sql = "SELECT * FROM Users WHERE email='$email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		echo "bad";
	}
	else
	{
		echo "ok";	
	}
?>