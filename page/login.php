<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include __DIR__ . '/../db.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Password verification
        if (password_verify($password, $user['password'])) {
            // Store user details in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_group'] = $user['user_group'];

            // Debugging output
            echo "User found: " . htmlspecialchars($user['email']) . "<br>";
            echo "User role: " . htmlspecialchars($user['user_group']) . "<br>";

            // Redirect based on user group
            if ($user['user_group'] === 'business_owner') {
                header("Location: my-account.php"); 
            } else {
                header("Location: my-account.php"); 
            }
            exit; 
        } else {
            $errorMessage = "Incorrect password.";
        }
    } else {
        $errorMessage = "No user found with this email.";
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
    <?php if (!empty($errorMessage)): ?>
        <div class="error"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
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
