<?php

if (isset($_FILES['file'])){

 if (move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name'])) {
        echo "File uploaded successfully: ";
    } else {
        echo "Error uploading file.";
    }
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
    <form action="" enctype="multipart/form-data" method="post">
        Select file to uplaod: <br> <br>
        <input type="file" name="file" >
        <br><br>
        <input type="submit" name="submit" >
        <input type="reset" name="reset" >



    </form>
    
</body>
</html>