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

        <title>Paul Vlahos / pvlahos1</title>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <!-- Main Page CSS / Custom CSS -->
        <link rel="stylesheet" href="css/shop-homepage.css" rel="stylesheet">

        <link rel="stylesheet" href="css/p2css.css" rel="stylesheet">

        <!-- Custom Scripts -->
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
                height: 208px;
            }
        </style>

    </head>

    <body>
        <div id="error">

        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Online Fruit Store</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <b>Login</b>
                                <b class="caret"></b>
                            </a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Login via
                                            <div class="social-buttons">
                                                <a href="#" class="btn btn-fb">
                                                    <i class="fa fa-facebook">
                                                    </i> Facebook
                                                </a>
                                                <a href="#" class="btn btn-tw">
                                                    <i class="fa fa-twitter">
                                                    </i> Twitter
                                                </a>
                                            </div>
                                            or
                                            <form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                    <input type="email" name="loginEmail" id="loginEmail" class="form-control" placeholder="Email address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                    <input type="password" name="loginPassword" id="loginPassword" class="form-control" placeholder="Password" required>
                                                    <div class="help-block text-right">
                                                        <a href="">Forget the password ?</a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" onclick="submitForm()" class="btn btn-success btn-outline btn-block" name="Login" id="Login" value="Login">
                                                        Sign in </button>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Keep me logged-in</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <b>Create an Account</b>
                                <b class="caret"></b>
                            </a>
                            <ul id="login-dp" class="dropdown-menu">
                                <form class="form" role="form" method="post" accept-charset="UTF-8" id="signup-nav">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputName2">First Name</label>
                                        <input type="text" name="signupName" id="signupName" class="form-control" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                        <input type="email" name="signupEmail" id="signupEmail" class="form-control" placeholder="Use string 'admin' for admin" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                        <input type="password" name="signupPassword" id="signupPassword" class="form-control" placeholder="Use string 'admin' for admin" required>
                                        <div class="help-block text-right">
                                            <a href="">Forget the password ?</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" onclick="register()" name="signup" class="btn btn-success btn-outline btn-block" value="Signup"> Register </button>
                                    </div>
                                </form>
                            </ul>
                        </li>
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

                    <h1 class="my-4">Project 2</h1>
                    <div class="list-group">
                        <a href="Home.php" class="list-group-item">Fruits</a>
                        <a href="#" class="list-group-item">Vegetables (NYI)</a>
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
                                <img class="d-block img-fluid" src="Media/fruits1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="Media/fruits2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="Media/fruits3.jpg" alt="Third slide">
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

                    <div class="row">

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <a href="#">
                                    <img class="card-img-top" src="Media/apples.jpg" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Apples</a>
                                    </h4>
                                    <?php
                                $sql = "SELECT * FROM ITEMS WHERE ITEM=('Apple')";
                                $result = $conn->query($sql);
                                
                                $row = $result->fetch_row();
                                $item = $row[0];
                                $price = $row[1];
                                $quantity = $row[2];
                                echo "<h5>$$price / Apple</h5>";
                                echo "<h6>Quantity: $quantity</h6>";
                                ?>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-outline btn-block" data-toggle="modal" data-target="#myModal" value="buy">Buy Now</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <a href="#">
                                    <img class="card-img-top" src="Media/oranges.jpg" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Oranges</a>
                                    </h4>
                                    <?php
                                $sql = "SELECT * FROM ITEMS WHERE ITEM=('Orange')";
                                $result = $conn->query($sql);
                                
                                $row = $result->fetch_row();
                                $item = $row[0];
                                $price = $row[1];
                                $quantity = $row[2];
                                echo "<h5>$$price / Orange</h5>";
                                echo "<h6>Quantity: $quantity</h6>";
                                ?>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-outline btn-block" data-toggle="modal" data-target="#myModal" value="buy">Buy Now</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <a href="#">
                                    <img class="card-img-top" src="Media/bananas.jpg" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Bananas</a>
                                    </h4>
                                    <?php
                                $sql = "SELECT * FROM ITEMS WHERE ITEM=('Banana')";
                                $result = $conn->query($sql);
                                
                                $row = $result->fetch_row();
                                $item = $row[0];
                                $price = $row[1];
                                $quantity = $row[2];
                                echo "<h5>$$price / Hand</h5>";
                                echo "<h6>Quantity: $quantity</h6>";
                                ?>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-outline btn-block" data-toggle="modal" data-target="#myModal" value="buy">Buy Now</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <a href="#">
                                    <img class="card-img-top" src="Media/grapes.jpg" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Grapes</a>
                                    </h4>
                                    <?php
                                $sql = "SELECT * FROM ITEMS WHERE ITEM=('Grape')";
                                $result = $conn->query($sql);
                                
                                $row = $result->fetch_row();
                                $item = $row[0];
                                $price = $row[1];
                                $quantity = $row[2];
                                echo "<h5>$$price / Bushel</h5>";
                                echo "<h6>Quantity: $quantity</h6>";
                                ?>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-outline btn-block" data-toggle="modal" data-target="#myModal" value="buy">Buy Now</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <a href="#">
                                    <img class="card-img-top" src="Media/pineapples.jpg" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Pineapples</a>
                                    </h4>
                                    <?php
                                $sql = "SELECT * FROM ITEMS WHERE ITEM=('Pineapple')";
                                $result = $conn->query($sql);
                                
                                $row = $result->fetch_row();
                                $item = $row[0];
                                $price = $row[1];
                                $quantity = $row[2];
                                echo "<h5>$$price / Pineapple</h5>";
                                echo "<h6>Quantity: $quantity</h6>";
                                ?>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-outline btn-block" data-toggle="modal" data-target="#myModal" value="buy">Buy Now</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <a href="#">
                                    <img class="card-img-top" src="Media/mangos.png" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Mangos</a>
                                    </h4>
                                    <?php
                                $sql = "SELECT * FROM ITEMS WHERE ITEM=('Mango')";
                                $result = $conn->query($sql);
                                
                                $row = $result->fetch_row();
                                $item = $row[0];
                                $price = $row[1];
                                $quantity = $row[2];
                                echo "<h5>$$price / Mango</h5>";
                                echo "<h6>Quantity: $quantity</h6>";
                                $conn->close();
                                ?>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-outline btn-block" data-toggle="modal" data-target="#myModal" value="buy">Buy Now</button>
                                </div>
                            </div>
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
                <p class="m-0 text-center text-white">Copyright &copy; Fruit Stand LLC</p>
            </div>
            <!-- /.container -->
        </footer>

    </body>