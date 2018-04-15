function placeOrder() {
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
                setTimeout(' window.location.href = "MemHome.php"; ', 2000);
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
}