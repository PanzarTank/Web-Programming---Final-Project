<?php

	if(!isset($_POST['email'])&&!isset($_POST['fname'])&&!isset($_POST['lname'])) {
		die();
	}
	else
	{
		session_start();
		require "db.php";
		$email = $_POST['email'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		
		$sql = "INSERT INTO Users VALUES (null, \"$fname\", \"$lname\", 2, \"$email\")";
		if ($conn->query($sql) === TRUE) 
		{
			echo "ok";
		} else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}
?>