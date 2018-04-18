<?php 
	$sql = "SELECT * FROM items WHERE itemID=$itemID";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$name = $row["itemName"];
			$price = $row["itemPrice"];
			$description = $row["itemDescription"];
			$imgdir = $row["itemImage"];
			$quantity = $row["itemQuantity"];
				
		echo	"<img src=\"$imgdir\" />
				<h1>$name</h1>
				<h3>Price: $$price</h3>
				<p class=\"lead\">Currently in stock: $quantity</p>
				<p>$description</p>
				<button type=\"submit\" class=\"btn btn-info btn-outline btn-block\" data-toggle=\"modal\" data-target=\"#myModal\" value=\"buy\">Buy Now</button>
		
		
		";
		}
	}
	else
	{
		echo "no item exists with this id :(";
	}
?>