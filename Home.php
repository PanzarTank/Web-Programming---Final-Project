<?php
    session_start();
    require 'php/db.php';
?>

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Online Game Store</title>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <!-- Main Page CSS / Custom CSS -->
        <link rel="stylesheet" href="css/shop-homepage.css" rel="stylesheet">

        <link rel="stylesheet" href="css/p2css.css" rel="stylesheet">

        <!-- Custom Scripts -->
        <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase-database.js"></script>

        <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
        <script>
            // Initialize Firebase
            var config = {
                apiKey: "AIzaSyD06ne1IJ8AdpYBdAGS3zIs3cimSuzlQ2Y",
                authDomain: "web-programming-final-pr-dccc6.firebaseapp.com",
                databaseURL: "https://web-programming-final-pr-dccc6.firebaseio.com",
                projectId: "web-programming-final-pr-dccc6",
                storageBucket: "",
                messagingSenderId: "107415577509"
            };
            firebase.initializeApp(config);
        </script>

        <script type="text/javascript" src="js/Login.js"></script>
        <script type="text/javascript" src="js/Register.js"></script>
        <script type="text/javascript" src="js/PriceCalc.js"></script>

        <!-- Popper JS -->
        <script src="https://unpkg.com/popper.js"></script>

        <!-- Ajax -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
            crossorigin="anonymous">

        <style>
            .card-body {
                height: 350px;
            }
        </style>

    </head>

    <body>
        <div id="error">

        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Online Game Store</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <div class="nav-item dropdown" id="login_dropdown" style="display:block">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <b>Login</b>
                                <b class="caret"></b>
                            </a>

                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                    <input type="email" name="loginEmail" id="loginEmail" class="form-control" placeholder="Email address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                    <input type="password" name="loginPassword" id="loginPassword" class="form-control" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <button onclick="login()" class="btn btn-success btn-outline btn-block" name="Login" id="Login" value="Login">
                                                        Sign in </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-item dropdown" id="create_dropdown" style="display:block">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <b>Create an Account</b>
                                <b class="caret"></b>
                            </a>
                            <ul id="login-dp" class="dropdown-menu">
                                <div class="form" role="form" method="post" accept-charset="UTF-8" id="signup-nav">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputName2">First Name</label>
                                        <input type="text" name="signupFName" id="signupFName" class="form-control" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputName2">Last Name</label>
                                        <input type="text" name="signupLName" id="signupLName" class="form-control" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                        <input type="email" name="signupEmail" id="signupEmail" class="form-control" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                        <input type="password" name="signupPassword" id="signupPassword" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <button onclick="register()" name="signup" class="btn btn-success btn-outline btn-block" value="Signup"> Register </button>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="nav-item dropdown" id="user_div" style="display:none">
                            <a href="#" class="nav-link active dropdown-toggle" data-toggle="dropdown" id="user_msg"></a>
                            <ul id="user_dp" class="dropdown-menu">
                                <div class="container">
                                    <button onclick="logout()" name="logout" class="btn btn-danger btn-outline btn-block" value="Signup"> Logout </button>
                                </div>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning alert-dismissable">
                                <strong>Sorry!</strong> Please register and/or log in to make orders!
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div id="registerModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success alert-dismissable">
                                <strong>Success!</strong> Account created. Please log in.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-3">

                    <h1 class="my-4">Final Project</h1>
                    <div class="list-group">
                        <a href="Home.php" class="list-group-item">Games</a>
						<?php 
							if(isset($_SESSION['perm_level']) && $_SESSION['perm_level']==3)
							{
								echo "<a href=\"Admin.php\" class=\"list-group-item\">Admin</a>";
							}
						?>
                        <!-- <a href="#" class="list-group-item">Vegetables (NYI)</a> -->
                    </div>

                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">

                    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="Media\banner1.jpeg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="Media\banner2.jpeg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="Media\banner3.jpeg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="form-group">
                        <script type="text/javascript" src="js/Search.js"></script>
                        <input class="form-control form-control-lg" placeholder="Search for an item" id="searchBar" type="text" onkeyup="search(this.value)" />
                        <div id="response" style="width: 100%;">
                        </div>
                    </div>

                    <div class="row">
                        <?php include "php/generateInventory.php" ?>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Game Store LLC</p>
            </div>
            <!-- /.container -->
        </footer>

    </body>