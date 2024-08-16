<?php 

$host="localhost";
$user="root";
$password="";
$database="users";

$connection=mysqli_connect($host,$user,$password,$database);

if(!$connection) die(mysqli_connect_error());
 else echo "database here".'<br>'.'<br>';



?>
