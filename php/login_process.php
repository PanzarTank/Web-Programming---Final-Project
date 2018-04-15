<?php
session_start();
include_once 'db.php';

if(isset($_POST['loginEmail'])) {
    //Information being submitted
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];
    //$message = "Login Email: " . $loginEmail . " Login Password: " . $loginPassword;
    //echo "<script type='text/javascript'>alert('$message');</script>";

    try {
        if (count($_POST) > 0) {
            $sql = "SELECT * FROM USERS WHERE EMAIL=('$loginEmail') AND PASSWORD=('$loginPassword')";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            $row = $result->fetch_assoc();
            if ($count == 0) {
                echo "Incorrect Login Info";
            } else {
                $_SESSION['user_session'] = $row['user_ID'];
                $_SESSION['perm_level'] = $row['PERM'];
                $_SESSION['first_name'] = $row['FIRSTN'];
                echo "Successfully Authenticated";
            }
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        //echo "<script type='text/javascript'>alert('$e');</script>";
    }
}

$conn->close();
?>