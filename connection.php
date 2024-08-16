<?php 

$host='localhost';
$user='root';
$password="";
$database='accounts';

$connection=mysqli_connect($host,$user,$password,$database);
if(!$connection) die(mysqli_connect_error());


?>