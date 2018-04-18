function search(str) {
    if (str.length == 0) {
        document.getElementById("response").innerHTML = "";
		console.log("strlen = 0");
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				console.log("results");
                document.getElementById("response").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "php/search.php?query=" + str, true);
        xmlhttp.send();
		console.log("query sent");
    }
}