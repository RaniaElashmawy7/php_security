<?php 
ini_set('display_errors','on');

session_start();
require 'connection.php' ;

if(isset($_POST['login'])){
    $name=($_POST['name']);
    $pass=($_POST['pass']);


    // Validate input 
    $error=array();
    if(!$name || !ctype_alpha($name) || strlen($name)>15){
        $error['name_error']="invalid fname";
    }

   if(!$password || !ctype_alnum($pass)|| strlen($pass) <6 || strlen($pass) >20 ){
        $error['pass_error']="invalid password";
    }

    if (!empty($error)) print_r($error);



    $query1="SELECT * FROM `info` WHERE `name` = ? ";
    $stmt = mysqli_prepare($connection,$query1);
    mysqli_stmt_bind_param($stmt,'s',$name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if((mysqli_num_rows($result)) >0){
         // Fetch the user data
        $row = mysqli_fetch_array($result);
        $hashedPassword = $row['password']; // Get the hashed password from the database

    
         // Verify the password
        if (password_verify($pass, $hashedPassword)) {
        
        $_SESSION['name'] = $name; // Store user name in session variable
        header("Location: welcome.php" );
        exit();         // Redirect to welcome page with the user's name
        } else {
            echo 'Invalid user name or password. Please try again.';
        }
  

    }else{
        echo 'user not found, you need to register first';
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
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
       username  : <input type="text" name="name"  > <br><br>
       password  : <input type="password" name="pass"  > <br><br>
        <input type="submit" name="login"><br><br>

        <a href="register2.php">register</a><br>
        <a href="forget password.php">forget password?</a>

    </form>
</body>
</html>