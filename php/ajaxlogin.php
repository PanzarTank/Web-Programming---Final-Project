<?php

	if(!isset($_POST['email'])) {
		die();
	}
	else
	{
		session_start();
		require "db.php";
		$email = $_POST['email'];
		$sql = "SELECT * FROM Users WHERE email='$email'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				$_SESSION['user_session'] = $row['userID'];
                $_SESSION['perm_level'] = $row['permLevel'];
				$_SESSION['email'] = $row['email'];
                $_SESSION['first_name'] = $row['firstname'];
				$_SESSION['last_name'] = $row['lastname'];
				echo "ok";
			}
	}
	else
	{
		echo "no such user";
	}
}
?>