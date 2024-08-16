<?php 

require 'connection.php' ;


if(isset($_POST['submit'])){
$token=$_POST['token'];
$password=$_POST['pass'];


$query="SELECT * FROM `reset` WHERE `token`='$token'";
$result=mysqli_query($connection,$query);

if(mysqli_num_rows($result) >0 ){ 
    $row= mysqli_fetch_array($result);
    $email=$row['email'];

//update password : 
    $query1="UPDATE `info` SET `password`='$password' WHERE `email`='$email'";
    $result1=mysqli_query($connection,$query1);

//delete the token:
$query2="DELETE FROM `reset` WHERE `email`='$email'";
$result2=mysqli_query($connection,$query2);

echo "Your password has been reset successfully.";

}else  echo "Invalid token.";



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
</head>
<body>
    <form action="" method="post">
    enter the token here    : <input type="text" name="token" ><br><br>
    enter your new password : <input type="password" name="pass" ><br><br>
    <input type="submit" name="submit" >
    
    </form>

</body>
</html>