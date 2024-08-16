<?php


header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload"); // Enable HSTS
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self'");


// Function to filter input
function filterInput($var) {
    $data = trim($var); // Trim whitespace and escape special characters
    $data = stripslashes($var); // Remove slashes
    return htmlentities($var, ENT_QUOTES, 'UTF-8'); // Escape HTML
}


if(isset($_POST['search'])){
    $name = filterInput($_POST['name']);
    echo "Hello ".$name;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <b>Name:<b>  <input type="text" name="name">
        </div>
        <br>
        <div>
         <input type="submit" name="search" value="search" >
        </div>
    

    </form>
    
</body>
</html>