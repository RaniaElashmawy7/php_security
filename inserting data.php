<?php 
require 'php connection.php';

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $password=md5($_POST['pass']);

    $query= "INSERT INTO `profiles`(`name`,`password`) VALUES ('$name','$password')";
if (mysqli_query($connection,$query)) echo "data added ".mysqli_insert_id($connection).'<br>'; //to excute this query // to show the last incremented id
else echo "error".'<br>';

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    user name: <input type="text" name="name">
    <br><br>
    password : <input type="password" name="pass">
    <br><br>
    <input type="submit" name="add" >

    </form>

</body>
</html>