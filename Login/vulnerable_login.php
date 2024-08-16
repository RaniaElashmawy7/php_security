<?php 

ini_set('display_errors','on');

session_start();
require 'connection.php' ;
// ini_set('display_errors','off');

if(isset($_POST['login'])){
    $name=($_POST['name']);
    $pass=($_POST['pass']);

    $query1="SELECT * FROM info WHERE name = '$name'";
    echo $query1;
    $result=mysqli_query($connection,$query1);
    if (!$result) {
        die('Query Error: ' . mysqli_error($connection));
    }

    $row_num=mysqli_num_rows($result);
    if($row_num >0){

        $_SESSION['name'] = $name; // Store user name in session variable
        header("Location: welcome.php" );
        exit();         // Redirect to welcome page with the user's name

    }else{
        echo 'user not found, you need to register first';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
       username  : <input type="text" name="name" required > <br><br>
       password  : <input type="password" name="pass" required > <br><br>
        <input type="submit" name="login"><br><br>

        <a href="register1.php">register</a><br>
        <a href="forget password.php">forget password?</a>

    </form>
</body>
</html>