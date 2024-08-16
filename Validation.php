<?php

// ==> input validation:

function check ($var){
    $var=trim($var);
    $var=strip_tags($var);
    $var=str_replace('\\','',$var);
    $var=htmlspecialchars($var);
    return $var;
}
function escape($str) {
    return htmlspecialchars($str);
}

if(isset($_POST['show'])){
     $f_name=check($_POST['f_name']);
     $l_name=check($_POST['l_name']);
     $u_name=check($_POST['u_name']);
     $pass=check($_POST['pass']);
     $ph_num=check($_POST['ph_num']);
     $mail=check($_POST['mail']);
     $web_site=check($_POST['web_site']);

     



// ==> conditions for inputs::
    $error=array();
    if(!$f_name || !ctype_alpha($f_name) || strlen($f_name)>15){
        $error['fname_error']="invalid fname";
    }

    if(!$l_name || !ctype_alpha($l_name) || strlen($l_name)>15){
        $error['lname_error']="invalid lname";
    }

    if(!$u_name || !ctype_alnum($u_name) || strlen($u_name)>15){
        $error['uname_error']="invalid uname";
    }

    if(!$ph_num || !ctype_digit($ph_num)|| strlen($ph_num) >11){
        $error['ph_num_error']="invalid ph_num";
    }

    if(!$pass || !ctype_alnum($pass)|| strlen($pass) <6 || strlen($pass) >20 ){
        $error['pass_error']="invalid password";
    }
        else{
            $pass=md5($pass);
            echo $pass.'<br>';
        }


    if(!$mail || !filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $error['email_error']="invalid mail";
    }
    if(!$web_site || !filter_var($web_site,FILTER_VALIDATE_URL)){
        $error['website_error']="invalid url";
    }
    if(isset($_FILES['image'])){
        // print_r($_FILES['image']);
        $image_name=$_FILES['image']['name'];
        $image_size=$_FILES['image']['size'];
        $image_tmp=$_FILES['image']['tmp_name'];
        $image_exe=strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $avil_ex=array('jpg','png');

        if($image_size > 2097152) $error['image_error']="to large error";
        if(!in_array($image_exe,$avil_ex))  $error['image_error'].="invalid exetention";
        if(empty($error['image_error'])) {
            move_uploaded_file($image_tmp,$image_name);


    }
} 
        
    
print_r($error);





    // ==>  ctype for pybass specefic inputs:

// if(ctype_alpha($f_name)) echo "valid" .$f_name."<br>";
// else echo "invalid"."<br>";

// if(ctype_digit($ph_num)) echo "valid num" .$ph_num."<br>";
// else echo "invalid num"."<br>";

// if(ctype_alnum($u_name)) echo "valid u_name " .$u_name."<br>";
// else echo "invalid u_name"."<br>";

// if(ctype_lower($u_name)) echo "small chars " .$u_name."<br>";
// else if (ctype_upper($u_name)) echo " capital chars"."<br>";
// else echo "mix";

// if(ctype_graph($u_name)) echo "no spaces " .$u_name."<br>";
// else echo "there is spaces"."<br>";


    




// // ==> filters:
// if(filter_var($f_name,FILTER_VALIDATE_INT)) echo "int date type";
// else echo "not int data"."<br>";

// if(filter_var($mail,FILTER_VALIDATE_EMAIL)) echo "valid email";
// else echo "not email"."<br>";

// echo (filter_var($f_name,FILTER_SANITIZE_NUMBER_FLOAT)) ;
// echo (filter_var($f_name,FILTER_SANITIZE_NUMBER_INT)) ;

    
    

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
    <form method="post" enctype="multipart/form-data">


        <label >First name:</label>
        <br> 
        <input type="text" id="f_name" name="f_name" value="<?php echo isset($f_name) ? escape($f_name) : ''; ?>">
        <?php if (isset($error['fname_error'])) echo $error['fname_error']; ?>
     
        <br> <br> 
        <label for="l_name">Last name:</label>
        <br>
        <input type="l_name" id="" name="l_name" >
        <?php if (isset($error['lname_error'])) echo $error['lname_error']; ?>
        <br><br>
        <label for="u_name">User name:</label>
        <br>
        <input type="text" id="u_name" name="u_name" > 
        <br><br>
        <label for="pass">Password:</label>
        <br>
        <input type="password" id="pass" name="pass" >
        <br><br>
        <label for="ph_num">Phone number:</label>
        <br>
        <input type="text" id="ph_num" name="ph_num" >
        <br><br>
        <label for="mail">Email:</label>
        <br>
        <input type="email" id="mail" name="mail" >
        <br><br>
        <label for="web_site">Website:</label>
        <br>
        <input type="url" id="web_site" name="web_site" >   
        <br><br>
        <label for="gender">Gender:</label>
        <br>
        <input type="radio" id="male" name="gender">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender">
        <label for="female">Female</label>
        <br><br>
        <label for="comment">Comment</label>
        <br>
        <textarea name="comment" id="comment" placeholder="comments" rows="5" cols="30"></textarea>
        <br><br>
        <label for="image">Image:</label>
        <br>
        <input type="file" name="image">
        <?php if (isset($error['image_error'])) echo $error['image_error']; ?>
        <br><br>
        <input type="submit" name= "show" value="Show">
        <input type="reset" name="Reset" value="Reset">




            
        

    </form>
</body>
</html>