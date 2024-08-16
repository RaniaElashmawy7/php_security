<?php 
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $name =($_POST['name']);
    $email=($_POST['email']);
    $password =($_POST['pass']);

//     if the email or username already exists
    $checkQuery = "SELECT * FROM info WHERE email = '$email' OR name = '$name'";
    $result = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // User already exists
        echo $message = 'Username or email already exists, Please choose another.';
    } else {
        // Proceed with registration
        $query = "INSERT INTO info (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($connection, $query)) {
            header('Location: Login1.php');
            exit; // Make sure to exit after redirect
        } else {
            die("Error: " . mysqli_error($connection));
        }
    }
mysqli_close($connection);

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
       username  : <input type="text" name="name"  > <br><br>
       password  : <input type="password" name="pass"  > <br><br>
       email     : <input type="email" name="email"  <?php echo isset($pass) ? escape($pass) : ''; ?>> <br><br>
        <input type="submit" name="register"><br><br>

        <a href="login.php">login</a>


    </form>
</body>
</html>
