firebase.auth().onAuthStateChanged(function (user) {
    if (user) {
        // User is signed in.

        document.getElementById("login_dropdown").style.display = "none";
        document.getElementById("create_dropdown").style.display = "none";
        document.getElementById("user_div").style.display = "block";

        var user = firebase.auth().currentUser;
        if (user != null) {
            var email = user.email;
            var uid = user.uid;
            document.getElementById("user_msg").innerHTML = "Welcome User: " + email;
        }


    } else {
        // User is signed out.
        document.getElementById("login_dropdown").style.display = "block";
        document.getElementById("create_dropdown").style.display = "block";
        document.getElementById("user_div").style.display = "none";
    }
});

function login() {
    var firstName = document.getElementById("signupFName").value;
    var lastName = document.getElementById("signupLName").value;
    var email = document.getElementById("loginEmail").value;
    var password = document.getElementById("loginPassword").value;
    //alert("email: " + email + "\n" + "password: " + password);
    firebase.auth().signInWithEmailAndPassword(email, password).then(function(user)
	{
		if (user) {
        // User is signed in.

        document.getElementById("login_dropdown").style.display = "none";
        document.getElementById("create_dropdown").style.display = "none";
        document.getElementById("user_div").style.display = "block";

        var user = firebase.auth().currentUser;
        if (user != null) {
            var email = user.email;
            var uid = user.uid;
            document.getElementById("user_msg").innerHTML = "Welcome User: " + email;
			}
		//AJAX for PHP session
			var email = user.email;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("POST", "php/ajaxlogin.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("email="+email); 
			console.log("email sent to ajaxlogin");
		//End AJAX for PHP session
		}
	}).catch(function (error) {
        var errorCode = error.code;
        var errorMessage = error.message;

        alert("Error: " + errorMessage)
        console.log(errorCode + "\n" + errorMessage);
    });
}

function logout() {
    firebase.auth().signOut().then(function () {
        // Sign-out successful.
    }).catch(function (error) {
        // An error happened.
        var errorCode = error.code;
        var errorMessage = error.message;

        alert("Error: " + errorNessage)
        console.log(errorCode + "\n" + errorMessage);
    });
}

/*

var data = $("#login-nav").serialize();
event.preventDefault();

$.ajax({

    type: 'POST',
    url: 'php/login_process.php',
    data: data,
    beforeSend: function () {
        $("#error").fadeOut();
    },
    success: function (response) {
        if (response.indexOf("Successfully Authenticated") >= 0) {
            console.log(response);
            $("#Login").html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i> &nbsp; Signing In ...');
            setTimeout(' window.location.href = "MemHome.php"; ', 2000);
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