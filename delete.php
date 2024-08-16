 <?php
 require 'php connection.php';


if(isset($_POST['delete'])){
    $d= $_POST['name'];

 $query="DELETE FROM `profiles` WHERE `name`='$d'";
 if(mysqli_query($connection,$query)) echo "deleted" ;
 else echo "error during deleting";
 mysqli_close($connection);

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
    <form action="" method="post" >
       name:  <input type="text" name="name">
        <input type="submit" name="delete" value="delete">
    </form>
</body>
</html>