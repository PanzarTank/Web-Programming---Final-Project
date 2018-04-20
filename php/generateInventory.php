<?php 
	$sql = "SELECT * FROM items";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$itemID = $row["itemID"];
			$name = $row["itemName"];
			$price = $row["itemPrice"];
			$description = $row["itemDescription"];
			$imgdir = $row["itemImage"];
			$quantity = $row["itemQuantity"];
				
		echo	"<div class=\"col-lg-4 col-md-6 mb-4\">
				<div class=\"card\">
					<a href=\"Item?id=$itemID\">
						<img class=\"card-img-top\" src=\"$imgdir\" alt=\"\">
					</a>
					<div class=\"card-body\">
						<h4 class=\"card-title\">
							<a href=\"Item?id=$itemID\">$name</a>
						</h4>

					<h5>$$price</h5>
					<h6>Quantity: $quantity</h6>
							<p class=\"card-text\">$description</p>
					</div>
					<div class=\"card-footer\">
					<button type=\"submit\" class=\"btn btn-info btn-outline btn-block\" onclick=\"window.location.href='Item?id=$itemID'\">View Item</button>
					</div>
				</div>
			</div>";
		}
	}
	else
	{
		echo "no inventory :(";
	}
?>