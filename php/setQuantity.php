<?php
session_start();
require 'db.php';

//Information being submitted
$userID = $_SESSION['user_session'];
$gameTemp = $_POST["adminGame"];
$quantity = $_POST["adminquantity"];

$gameTemp2 = explode(",", $gameTemp);
$game = $gameTemp2[0];

$message = "Game ID: " . $game . " Quantity: " . $quantity;
echo "<script type='text/javascript'>alert('$message');</script>";

if (mysqli_query($conn,"UPDATE items SET itemQuantity=$quantity WHERE itemID=$game") === TRUE) {
    echo "Quantity Set";
} else {
    echo "Unsuccessful";
}

$conn->close();
?>