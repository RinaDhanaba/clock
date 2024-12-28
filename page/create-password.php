<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include __DIR__ . '/../db.php'; // Ensure the correct relative path to db.php

// Check if email is present in the session
if (!isset($_SESSION['registration_email'])) {
    die("Invalid password creation request.");
}

$email = $_SESSION['registration_email'];

// Process password creation if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate password
    if (strlen($password) < 8) {
        die("Password must be at least 8 characters long.");
    }

    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update user record with hashed password
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->execute([$hashed_password, $email]);

    // Clear session variables
    unset($_SESSION['registration_email']);

    // Success message and potential redirection
    echo "Password created successfully! You can now log in.";
    // header("Location: login.php"); // Redirect to login page (optional)
    exit;
}

// Display password creation form
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Password</title>
</head>
<body>
  <h1>Create Password</h1>
  <form action="" method="POST">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" required>
    <br>
    <button type="submit">Create Password</button>
  </form>
</body>
</html>
