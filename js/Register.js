function register() {
    var data = $("#signup-nav").serialize();
    event.preventDefault();

    $.ajax({

        type: 'POST',
        url: 'php/register.php',
        data: data,
        beforeSend: function () {
            $("#error").fadeOut();
        },
        success: function (response) {
            if (response.indexOf("New Account Created") >= 0) {
                console.log(response);
                $("#signup").html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i> &nbsp; Creating Account...');
                setTimeout(' window.location.href = "Home.php"; ', 2000);
                $("#registerModal").modal();
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