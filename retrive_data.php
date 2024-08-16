<?php 
require 'php connection.php';
// retrive data from data base:
$query1="SELECT * FROM `profiles`  ORDER BY `name` DESC ";
$result=mysqli_query($connection,$query1);

while($row=mysqli_fetch_array($result)){  // to show the fetched data 
    echo "user_id =".$row['id']." ,". "user_name =". $row['name']." ,". "user_password = ".$row['password'].'<br>';
}
echo'<br>';




$query2="SELECT COUNT(`id`) AS c FROM `profiles` ";
$result2=mysqli_query($connection,$query2);
$data =mysqli_fetch_array($result2);
echo "count = ".$data['c'].'<br>';
echo'<br>';


$query3="SELECT MAX(`id`) AS c FROM `profiles` ";
$result3=mysqli_query($connection,$query3);
$data3 =mysqli_fetch_array($result3);
echo "max = ".$data3['c'].'<br>';
echo'<br>';

$query4="SELECT MIN(`id`) AS c FROM `profiles` ";
$result4=mysqli_query($connection,$query4);
$data4 =mysqli_fetch_array($result4);
echo "min = ".$data4['c'].'<br>';
echo'<br>';

$query5="SELECT SUM(`id`) AS c FROM `profiles` ";
$result5=mysqli_query($connection,$query5);
$data5 =mysqli_fetch_array($result5);
echo "sum = ".$data5['c'].'<br>';
echo'<br>';

$query6="SELECT AVG(`id`) AS c FROM `profiles` ";
$result6=mysqli_query($connection,$query6);
$data6 =mysqli_fetch_array($result6);
echo "avg= ".$data6['c'].'<br>';
echo'<br>';

$query7="SELECT UPPER (`name`) AS B FROM `profiles` ";
$result7=mysqli_query($connection,$query7);
while($data7 =mysqli_fetch_array($result7)){
echo "name= ".$data7['B'].'<br>';
}
echo'<br>';

$query8="SELECT MID(`name`,1,3) AS c FROM `profiles` ";
$result8=mysqli_query($connection,$query8);
while($data8 =mysqli_fetch_array($result8)){
echo "avg= ".$data8['c'].'<br>';
}
echo'<br>';

$query9="SELECT ROUND(`id`) AS c FROM `profiles` ";
$result9=mysqli_query($connection,$query9);
while($data9 =mysqli_fetch_array($result9)){
echo "avg= ".$data9['c'].'<br>';
}






mysqli_close($connection);