<?php
ob_start(); // Start output buffering
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_unset();
session_destroy();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    
<?php
session_start();
include __DIR__ . '/../db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($stmt->rowCount() === 0) {
        echo "No user found with this email.<br>";
    } elseif (!password_verify($password, $user['password'])) {
        echo "Password does not match.<br>";
    }
    
    if ($user) {
        echo "User found: " . htmlspecialchars($user['email']) . "<br>";
        echo "Password hash in DB: " . htmlspecialchars($user['password']) . "<br>";
        if (password_verify($password, $user['password'])) {
            echo "Password verified.<br>";
        } else {
            echo "Password mismatch.<br>";
        }
    } else {
        echo "User not found.<br>";
    }
    

    if ($user && password_verify($password, $user['password'])) {
        // Store user details in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_group'] = $user['user_group'];

        // Redirect based on user group
        if ($user['user_group'] === 'business_owner') {
            header("Location: my-account.php");
        } else {
            header("Location: my-account.php");
        }
    } else {
        echo "Invalid email or password.";
    }
}
?>

<h1>Login</h1>

<form action="login.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Login</button>
</form>

<a href="/registration">create account</a>
</body>
</html>