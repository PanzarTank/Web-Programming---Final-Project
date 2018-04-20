function placeOrder() {
	
			var itemID = document.getElementById("gameID").innerHTML;
			var itemQuantity = document.getElementById("quantity").value;
			console.log("begin");
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState == 4){
					if(xmlhttp.status == 200){
						console.log("response");
						document.getElementById("orderSuccess").style.display = "block";
						setTimeout(function(){window.location.replace("Home.php");}, 2000);
					}
				}
			};
			xmlhttp.open("POST", "php/placeOrder.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("itemQuantity="+itemQuantity+"&itemID="+itemID); 
			console.log("transaction sent to placeOrder.php");
			return false;

/*	
	var data = $("#modal-order").serialize();
    event.preventDefault();

    $.ajax({

        type: 'POST',
        url: 'php/placeOrder.php',
        data: data,
        beforeSend: function () {
            $("#error").fadeOut();
        },
        success: function (response) {
            if (response.indexOf("Order Created") >= 0) {
                console.log(response);
                $("#place_order").html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i> &nbsp; Placing Order...');
                setTimeout(' window.location.href = "Home.php"; ', 2000);
                $('.modal').modal('hide');
                $("#orderModal").modal();
            } else {
                console.log(response);
                $("#error").fadeIn(1000, function () {
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                    $("#Login").html('&nbsp; Sign In');
                });
            }
        }
    });
    return false;
	*/
}