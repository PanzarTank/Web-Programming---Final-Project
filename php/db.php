<?php
session_start();
$servername = "localhost";
$username = "pvlahos1";
$password = "pvlahos1";
$dbName = "pvlahos1";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>