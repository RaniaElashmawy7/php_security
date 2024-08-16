<?php

if(isset($_POST['search'])){
    $name = $_POST['name'];
    echo "Hello ".$name;
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