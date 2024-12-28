
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include 'db.php';

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

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        die("Email already registered.");
    }
    
    // Insert email and user group into database
    $stmt = $pdo->prepare("INSERT INTO users (email, user_group) VALUES (?, ?)");
    $stmt->execute([$email, $user_group]);

    // Generate a unique token for password creation
    $token = bin2hex(random_bytes(32));

    // Send email with password creation link
    $subject = "Create Your Password";
    $message = "Click the link below to create your password:\n\n";
    $message .= "/create-password?token=$token&email=$email";
    $headers = "From: rinadhanaba@gmail.com";

    if (mail($email, $subject, $message, $headers)) {
        echo "A password creation link has been sent to your email.";
    } else {
        echo "Failed to send email.";
    }
}
?>


    <!-- Theme Toggle Button -->
    <button class="theme-toggle" onclick="toggleTheme()">Toggle Theme</button>



    <form action="body.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    
    <label for="user_group">Register as:</label>
    <select name="user_group" id="user_group" required>
        <option value="user">User</option>
        <option value="business_owner">Business Owner</option>
    </select>

    <button type="submit">Register</button>
</form>




    <!-- App Information Section -->
    <div class="app-info">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm1 15h-2v-2h2Zm0-4h-2V7h2Z" />
        </svg>
        <p>Track your time, manage your projects, and improve productivity with our easy-to-use tools. Accessible via both desktop and web.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis veniam illum, amet dignissimos deserunt aperiam ipsam</p>
    </div>