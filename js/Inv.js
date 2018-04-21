function refreshInventory() {
	console.log("begin");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4){
			if(xmlhttp.status == 200){
				console.log("response");
				document.getElementById("inventorydiv").innerHTML = this.responseText;
			}
		}
	};
	xmlhttp.open("GET", "php/generateInventory.php", true);
	xmlhttp.send(); 
	console.log("update inv request sent");
	return false;
}