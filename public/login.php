<?php
// public/login.php
require_once '../config/config.php';
require_once '../config/db.php';
require_once '../includes/auth.php';

// If user is already logged in, redirect to dashboard
if (is_logged_in()) {
    header("Location: index.php");
    exit;
}

// Handle traditional login submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'], $_POST['password'])) {
    $email = $mysqli->real_escape_string(trim($_POST['email']));
    $password = trim($_POST['password']);

    // In a real application, you should hash your passwords and verify using password_verify()
    $sql = "SELECT id, name, email, role, password FROM users WHERE email = '$email' LIMIT 1";
    $result = $mysqli->query($sql);
    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // For demonstration, assume plain text password check (not recommended)
        if ($password === $user['password']) {
            // Store user data in session
            $_SESSION['user'] = [
                'id'    => $user['id'],
                'name'  => $user['name'],
                'email' => $user['email'],
                'role'  => $user['role']
            ];
            header("Location: index.php");
            exit;
        } else {
            $message = "Invalid credentials.";
        }
    } else {
        $message = "User not found.";
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-3">Login</h2>
        <?php if ($message): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="post" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
