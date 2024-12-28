<?php
ob_start(); // Start output buffering (Ensure no output before header())
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure no previous session is active
if (isset($_SESSION['user_id'])) {
    header("Location: my-account.php");
    exit;
}

include __DIR__ . '/../db.php'; // Ensure the correct path to db.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Debugging output
        echo "User found: " . htmlspecialchars($user['email']) . "<br>";
        echo "Password hash in DB: " . htmlspecialchars($user['password']) . "<br>";

        // Password verification
        if (password_verify($password, $user['password'])) {
            echo "Password verified.<br>";

            // Store user details in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_group'] = $user['user_group'];

            // Redirect based on user group
            if ($user['user_group'] === 'business_owner') {
                header("Location: my-account.php");
                exit; // Stop further script execution
            } else {
                header("Location: my-account.php");
                exit; // Stop further script execution
            }
        } else {
            echo "Password does not match.<br>";
        }
    } else {
        echo "No user found with this email.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>
    <a href="/registration">Create Account</a>
</body>
</html>
