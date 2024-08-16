
 <?php
    // Define allowed commands as an indexed array
    $allowed_commands = ['dir', 'cd', 'systeminfo', 'ping'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the selected command and argument
        $selected_command = $_POST['command'];
        $arg = $_POST['arg'];

        // Validate the command
        if (in_array($selected_command, $allowed_commands)) {
            // Escape the command
            $command = escapeshellcmd($selected_command);
            
            // Escape and append the argument if provided
            if (!empty($arg)) {
                $command .= ' ' . escapeshellarg($arg);
            }

            // Execute the command and capture the output
            $output = shell_exec($command);

            // Display the output
            if ($output) {
                echo "<h2>Command Output:</h2><pre>" . htmlspecialchars($output) . "</pre>";
            } else {
                echo "<h2>No output or command failed.</h2>";
            }
        } else {
            echo "<h2>Invalid command.</h2>";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Windows Command Executor</title>
</head>
<body>
    <h1>Execute Windows Command (Secure)</h1>
    <form method="post">
        <label for="command">Select command:</label>
        <select name="command" id="command" required>
            <option value="dir">dir</option>
            <option value="cd">cd</option>
            <option value="systeminfo">systeminfo</option>
            <option value="ping">ping</option>
        </select>
        <input type="text" name="arg" placeholder="Enter argument (if any)">
        <input type="submit" value="Execute">
    </form>
</body>
</html>