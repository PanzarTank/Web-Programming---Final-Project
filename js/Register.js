function register() {
    var firstName = document.getElementById("signupFName").value;
    var lastName = document.getElementById("signupLName").value;
    var email = document.getElementById("signupEmail").value;
    var password = document.getElementById("signupPassword").value;
	
	
    firebase.auth().createUserWithEmailAndPassword(email, password).then(function(user){
		if (user) {
        // User is signed in.

		//AJAX to insert user into database
			var email = user.email;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("POST", "php/ajaxregister.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("email="+email+"&fname="+firstName+"&lname="+lastName); 
			console.log("email sent to ajaxregister");
		//end database insert
		
		//AJAX for PHP session
			var email = user.email;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("POST", "php/ajaxlogin.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("email="+email); 
			console.log("email sent to ajaxlogin");
		//End AJAX for PHP session
		
        document.getElementById("login_dropdown").style.display = "none";
        document.getElementById("create_dropdown").style.display = "none";
        document.getElementById("user_div").style.display = "block";

        var user = firebase.auth().currentUser;
        if (user != null) {
            var email = user.email;
            var uid = user.uid;
            document.getElementById("user_msg").innerHTML = "Welcome User: " + email;
        }
    }
		
		
	}).catch(function (error) {
        var errorCode = error.code;
        var errorMessage = error.message;

        if (errorCode === 'auth/wrong-password') {
            alert('Wrong password.');
        } else {
            alert(errorMessage);
        }
        console.log(error);
    });

    /*
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
    return false; */
}