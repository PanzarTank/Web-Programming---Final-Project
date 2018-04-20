<?php
session_start();
require 'db.php';

//Information being submitted
$userID = $_SESSION['user_session'];
$itemID = $_POST["itemID"];
$quantity = $_POST["itemQuantity"];

if ((mysqli_query($conn,"INSERT INTO orderTable (orderID, quantity, itemID, userID) VALUES (null ,'$quantity' ,'$itemID', '$userID')") === TRUE)
    && (mysqli_query($conn,"UPDATE items SET itemQuantity=itemQuantity-'$quantity' WHERE itemID=('$itemID')") === TRUE)) {
    echo "ok";
} else {
    echo "unsuccessful :(";
}

$conn->close();
?>