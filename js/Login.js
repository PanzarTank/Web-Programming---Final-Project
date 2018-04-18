function login() {
    var firstName = document.getElementById("signupFName").value;
    var lastName = document.getElementById("signupLName").value;
    var email = document.getElementById("loginEmail").value;
    var password = document.getElementById("loginPassword").value;
    alert("email: " + email + "\n" + "password: " + password);
    firebase.auth().signInWithEmailAndPassword(email, password).catch(function (error) {
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
}

firebase.auth().onAuthStateChanged(function (user) {
    if (user) {
        // User is signed in.
        alert("State changed fam")
        var displayName = user.displayName;
        var email = user.email;
        var emailVerified = user.emailVerified;
        var photoURL = user.photoURL;
        var isAnonymous = user.isAnonymous;
        var uid = user.uid;
        var providerData = user.providerData;
        // ...
    } else {
        // User is signed out.
        // ...
    }
});