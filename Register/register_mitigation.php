<?php 
ini_set('display_errors','on');

require 'connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $name =($_POST['name']);
    $email=($_POST['email']);
    $password = $_POST['pass'];

    // Validate input 
    $error=array();
    if(!$name || !ctype_alpha($name) || strlen($name)>15){
        $error['name_error']="invalid name";
    }

   if(!$password || !ctype_alnum($password)|| strlen($password) <6 || strlen($password) >20 ){
        $error['pass_error']="invalid password";
    }
     if(!$email || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['email_error']="invalid mail";
    }

    if (!empty($error)) {
        print_r($error);
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


//     if the email or username already exists
    $checkQuery = "SELECT * FROM `info` WHERE `email` = ? OR `name` = ?";
    $stmt = mysqli_prepare($connection, $checkQuery);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $name); // Bind parameters
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ((mysqli_num_rows($result)) > 0) {
        // User already exists
        echo $message = 'Username or email already exists, Please choose another.';
    } else {

        $query = "INSERT INTO `info` (`name`, `email`, `password`) VALUES (?,?,?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt,'sss', $name, $email, $hashedPassword); 
        if (mysqli_stmt_execute($stmt)) {
            header('Location: Login2.php');
            exit; // Make sure to exit after redirect
        } else {
            die("Error: " . mysqli_error($connection));
        }
    }
mysqli_stmt_close($stmt); // Close the statement
mysqli_close($connection);

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

</head>
<body>
    <h2>Register</h2>
    <form action="" method="post">
       username  : <input type="text" name="name" required  > <br><br>
       password  : <input type="password" name="pass" required > <br><br>
       email     : <input type="email" name="email" required> <br><br>
        <input type="submit" name="register"><br><br>

        <a href="login.php">login</a>


    </form>
</body>
</html>