<?php  
require 'php connection.php';

if(isset($_POST['update'])){
    $s=($_POST['search_key']);
    $query = "UPDATE `profiles` SET `name`='NONA', `password`=555
    WHERE `id`='$s' ";
    if(mysqli_query($connection,$query)) echo "updated";
    else "there is an error";

mysqli_close($connection);



}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        id:  <input type="text" name = "search_key">
             <input type="submit" name="update" value="update">




    </form>
    
</body>
</html>