<?php 
session_set_cookie_params(['samesite' => 'Lax']);

session_start(); // Start the session

// Generate a CSRF token if it doesn't exist
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Simulate a money transfer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF validation failed');
    }

    // Process the form
    $amount = $_POST['amount'];
    $to_account = $_POST['to_account'];

    // In a real-world scenario, you would have code here to perform the transaction
    echo "Transferred $$amount to account $to_account";

    // Regenerate the CSRF token to prevent reuse
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Transfer Money</h2>
<form method="POST" action="">
  <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
  Amount    : <input type="text" name="amount"><br><br>
  To Account: <input type="text" name="to_account"><br><br>
  <input type="submit" value="Transfer">
</form>

</body>
</html>