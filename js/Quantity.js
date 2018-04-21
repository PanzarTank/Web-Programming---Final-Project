function Quantity() {
	var adminquantity = document.getElementById("adminquantity").value;
	var adminGame = document.getElementById("adminGame").value;
	console.log("begin");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4){
			if(xmlhttp.status == 200){
				console.log("response");
				$('.modal').modal('hide');
				$("#adminSuccess").modal();
				refreshInventory();
			}
		}
	};
	xmlhttp.open("POST", "php/setQuantity.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("adminGame="+adminGame+"&adminquantity="+adminquantity); 
	console.log("data sent to setQuantity.php");
	return false;
	/*
    var data = $("#adminForm").serialize();
    e.preventDefault();

    $.ajax({

        type: 'POST',
        url: 'php/setQuantity.php',
        data: data,
        beforeSend: function() {
            $("#error").fadeOut();
        },
        success: function(response) {
            if (response.indexOf("Quantity Set") >= 0) {
                console.log(response);
                $("#setQuantity").html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i> &nbsp; Setting Quantity');
                setTimeout(' window.location.href = "Home.php"; ', 2000);
                $('.modal').modal('hide');
                $("#adminSuccess").modal();
            } else {
                console.log(response);
                $("#error").fadeIn(1000, function() {
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                    $("#Login").html('&nbsp; Sign In');
                });
            }
        }
    });
    return false;
	*/
}