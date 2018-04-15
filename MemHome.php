<?php
    session_start();
    require 'php/db.php';

if(!isset($_SESSION['user_session']))
{
    header("Location: Home.php");
    //$message = "Session isn't set";
    //echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    //$message = "Session is set. User ID: " . $_SESSION['user_session'] . " Permission Level: " . $_SESSION['perm_level'];
    //echo "<script type='text/javascript'>alert('$message');</script>";
}                                               
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

        <script type="text/javascript" src="js/PriceCalc.js"></script>

        <script type="text/javascript" src="js/Register.js"></script>

        <script type="text/javascript" src="js/Order.js"></script>

        <script type="text/javascript" src="js/Quantity.js"></script>

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
        <script>
            function scopeTest() {
                alert("Within scope");
            }
        </script>
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
                        <li class="nav-item">
                            <?php
                            if ($_SESSION['perm_level'] == 3) {
                            $message = $message = "Welcome Admin " . $_SESSION['first_name'];
                            echo '<a href="#" class="nav-link">'.$message.'</a>'; 
                            } else {
                            $message = $message = "Welcome User " . $_SESSION['first_name'];
                            echo '<a href="#" class="nav-link">'.$message.'</a>'; 
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <a href="php/logout.php" class="nav-link">Logout</a>
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
                        <div class="modal-header"> Place an Order!
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-dismissable">
                                <form class="form" role="form" method="post" accept-charset="UTF-8" id="modal-order">
                                    <div class="form-group">
                                        <label>Choose an item</label>
                                        <select name="fruit" onChange="calculatePrice()" class="form-control col" id="fruit">
                                            <option value="Apple,1.55">Apple(s)&nbsp;/ $1.55</option>
                                            <option value="Orange,0.75">Orange(s)&nbsp;/ $0.75</option>
                                            <option value="Banana,1.75">Banana(s)&nbsp;/ $1.75</option>
                                            <option value="Grape,1.05">Grape(s)&nbsp;/ $1.05</option>
                                            <option value="Pineapple,5.85">Pineapple(s)&nbsp;/ $5.85</option>
                                            <option value="Mango,3.45">Mango(s)&nbsp;/ $3.45</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <select name="quantity" onChange="calculatePrice()" class="form-control col" id="quantity">
                                            <option value="1">1</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-4">Total Price: </label>
                                        <div class="col-4">
                                            <input type="text" readonly class="form-control-plaintext" id="PicExtPrice" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" onclick="placeOrder()" class="btn btn-success btn-outline btn-block" name="place_order" id="place_order"
                                            value="order">
                                            Place Order </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-outline" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div id="adminModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header"> Set Stock of Items!
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-dismissable">
                                <form class="form" role="form" method="post" accept-charset="UTF-8" id="adminForm">
                                    <div class="form-group">
                                        <label>Choose an item</label>
                                        <select class="form-control col" id="adminfruit" name="adminfruit">
                                            <option value="Apple,1.55">Apple(s)&nbsp;/ $1.55</option>
                                            <option value="Orange,0.75">Orange(s)&nbsp;/ $0.75</option>
                                            <option value="Banana,1.75">Banana(s)&nbsp;/ $1.75</option>
                                            <option value="Grape,1.05">Grape(s)&nbsp;/ $1.05</option>
                                            <option value="Pineapple,5.85">Pineapple(s)&nbsp;/ $5.85</option>
                                            <option value="Mango,3.45">Mango(s)&nbsp;/ $3.45</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" id="adminquantity" name="adminquantity" placeholder="Enter an integer">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" onclick="Quantity()" class="btn btn-success btn-outline btn-block" id="setQuantity">
                                            Set Stock Quantity</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-outline" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div id="orderModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success alert-dismissable">
                                <strong>Success!</strong> Order Placed!
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div id="adminSuccess" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success alert-dismissable">
                                <strong>Success!</strong> Quantity Set!
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
                        <a href="MemHome.php" class="list-group-item">Fruits</a>
                        <a href="#" class="list-group-item">Vegetables (NYI)</a>
                        <br>
                        <?php
                        if ($_SESSION['perm_level'] == 3) {
                            echo '<button type="button" id="adminButton" data-toggle="modal" data-target="#adminModal" class="btn btn-danger">SUPER ADMIN BUTTON</button>';
                        }
                        ?>
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
                                require 'php/db.php';
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