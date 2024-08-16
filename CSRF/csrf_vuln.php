<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $to_account = $_POST['to_account'];

    echo "Transferred $$amount to account $to_account";
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Transfer Money</h2>
<form method="POST" action="">
  Amount    : <input type="text" name="amount"><br><br>
  To Account: <input type="text" name="to_account"><br><br>
  <input type="submit" value="Transfer">
</form>

</body>
</html>