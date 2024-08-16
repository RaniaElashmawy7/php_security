<?php 
require 'connection.php' ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $host=$_SERVER['HTTP_HOST'];


  

    $resetLink= "http://{$host}/reset_pass.php?token=1234";
    echo $resetLink;
         

    }else echo "No account found with that email address.";
                
}
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget password</title>
</head>
<body>
    <form action="" method="post">
        enter your email : <input type="text" name="email" required ><br><br>
<input type="submit" name="submit">


    </form>
</body>
</html>