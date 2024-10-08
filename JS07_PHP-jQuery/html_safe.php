<!DOCTYPE html>
<html>
<head>
    <title>HTML Safe Input</title>
</head>
<body>
    <h1>HTML Safe Input</h1>

    <form method="post" action="">
        <label for="input">Enter text:</label>
        <input type="text" name="input" id="input">
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = $_POST['input'];

        // Sanitize the input using htmlspecialchars
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        // Display the sanitized input
        echo "<h2>Sanitized Input:</h2>";
        echo "<p>$input</p>";
    }
    ?>
</body>
</html>