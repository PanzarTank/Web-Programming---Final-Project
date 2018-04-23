function addItem() {
	
	var itemName = document.getElementById("inputTitle").value;
	var itemPrice = document.getElementById("inputPrice").value;
	var itemDescription = document.getElementById("inputDescription").value;
	var itemQuantity = document.getElementById("inputQuantity").value;
	var itemImage = document.getElementById("inputImage").value;
	
	if(!isNaN(itemPrice) && (itemPrice!=null) && (itemName!="") && (itemName!=null) && (itemDescription!="") && (itemDescription!=null) && (!isNaN(itemQuantity)) && (itemQuantity!=null) && (itemImage!="") && (itemImage!=null))
	{
		console.log("begin");
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState == 4){
				if(xmlhttp.status == 200){
					console.log("response");
					$('.modal').modal('hide');
					$("#adminSuccess").modal();
					document.getElementById("successText").innerHTML = "Item successfully added to inventory!";
					refreshInventory();
				}
			}
		};
		xmlhttp.open("POST", "php/addItem.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("itemName="+itemName+"&itemPrice="+itemPrice+"&itemDescription="+itemDescription+"&itemQuantity="+itemQuantity+"&itemImage="+itemImage); 
		console.log("data sent to addItem.php");
		return false;
	}
}