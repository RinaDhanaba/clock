<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include BASE_PATH . '/db.php';

// Process the form when submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $user_group = trim($_POST['user_group']);

    // Validate email and user group
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }
    if (!in_array($user_group, ['user', 'business_owner'])) {
        die("Invalid user group selected.");
    }

    // Check if the email already exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        die("This email is already registered.");
    }

    // Insert email and user group into the database
    $stmt = $pdo->prepare("INSERT INTO users (email, user_group) VALUES (?, ?)");
    $stmt->execute([$email, $user_group]);

    // Generate a unique token for password creation
    $token = bin2hex(random_bytes(32));

    // Save the token in the database
    $stmt = $pdo->prepare("UPDATE users SET token = ? WHERE email = ?");
    $stmt->execute([$token, $email]);

    // Store token and email in session
    $_SESSION['registration_token'] = $token;
    $_SESSION['registration_email'] = $email;

    // Redirect directly to the password creation page
    header("Location: /create-password");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="user_group">I am a:</label>
        <select name="user_group" id="user_group" required>
            <option value="user">User</option>
            <option value="business_owner">Business Owner</option>
        </select>
        <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
