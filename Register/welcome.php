<?php  

session_start();

echo "Welcome ".$_SESSION['name'];

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}


?>