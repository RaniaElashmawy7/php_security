
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the command from the input without any validation or escaping
        $user_command = $_POST['command'];

        // Directly execute the user command (COMPLETELY VULNERABLE)
        $output = shell_exec($user_command);

        // Display the output
        if ($output) {
            echo "<h2>Command Output:</h2><pre>" . $output . "</pre>";
        } else {
            echo "<h2>No output or command failed.</h2>";
        }
    }
    ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completely Vulnerable Command Executor</title>
</head>
<body>
    <h1>Execute Shell Command (Totally Vulnerable)</h1>
    <form method="post">
        <label for="command">Enter shell command:</label>
        <input type="text" name="command" id="command" required>
        <input type="submit" value="Execute">
    </form>

</body>
</html>