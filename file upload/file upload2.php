<?php 
if(isset($_FILES['file'])) {
    $file_name=preg_replace('/[^a-zA-Z0-9_\-\.]/', '_',$_FILES['file']['name']);
    $file_tmp=$_FILES['file']['tmp_name'];
    $file_size=$_FILES['file']['size'];
    $file_error=$_FILES['file']['error'];
    $file_exe=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

    $allowed_exe = array('jpg','png','jpeg');
    $target_dir = "uploads/";

    // Create uploads directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0644, true);
    }
    
    if(in_array($file_exe,$allowed_exe)){

        if($file_size <= 4*1024*1024 ){
        
        $mimeType = mime_content_type($file_tmp);
        $isImage = preg_match('/^image\//', $mimeType);
        
        if ($isImage) {  
        //Generate a unique file name
        $safeFileName = uniqid('',true) . '-' . basename($file_name) . '.' . $file_exe; // Reconstruct file name
        $target_file = $target_dir . $safeFileName;

        if (move_uploaded_file($file_tmp, $target_file))  echo "File uploaded successfully";      
    else  echo "Error uploading your file.";

    }else{
            echo "The uploaded file is not a valid image.";
        }
  
    }else {
    echo "File too large. Maximum allowed size is 4MB.";
    }
    }else echo "Invalid file type. Allowed types are: jpg, png, jpeg.";
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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post">
        Select file to upload: <br> <br>
        <input type="file" name="file" >
        <br><br>
        <input type="submit" name="submit" >
        <input type="reset" name="reset" >



    </form>
    
</body>
</html>