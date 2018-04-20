<?php
if(isset($_REQUEST['query'])){
	
	require "db.php";
	$query =$_REQUEST['query'] . '%';
	$sql = "SELECT * FROM items where itemName LIKE \"$query\"";
	$result = $conn->query($sql);
	echo $conn->error;
	if ($result->num_rows > 0) 
	{
		echo "<div class=\"form-control\" style=\"position:absolute; z-index:100; width:97%;\"><table class=\"table\">";
		while($row = $result->fetch_assoc()) 
		{

					$itemID = $row["itemID"];
					$name = $row["itemName"];
                    echo "<tr><td><a href=\"Item.php?id=$itemID\">" . $name . "</a></td></tr>";

        
		}
		echo "</table></div>";
    } 
}
?>