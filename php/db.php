<?php
$servername = "csc4370web.ckjcl6vkh8wc.us-east-2.rds.amazonaws.com";
$username = "HaiThuy";
$password = "csc4370web";
$dbName = "csc4370web";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>