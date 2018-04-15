function Quantity() {
    var data = $("#adminForm").serialize();
    event.preventDefault();

    $.ajax({

        type: 'POST',
        url: 'php/setQuantity.php',
        data: data,
        beforeSend: function () {
            $("#error").fadeOut();
        },
        success: function (response) {
            if (response.indexOf("Quantity Set") >= 0) {
                console.log(response);
                $("#setQuantity").html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i> &nbsp; Setting Quantity');
                setTimeout(' window.location.href = "MemHome.php"; ', 2000);
                $('.modal').modal('hide');
                $("#adminSuccess").modal();
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
}