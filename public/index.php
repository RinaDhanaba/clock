<?php
// public/index.php
require_once '../config/config.php';
require_once '../includes/auth.php';
require_login();
include '../includes/header.php';
?>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h1>

<?php
// Display content based on role.
switch ($_SESSION['user']['role']) {
    case 'admin':
        echo "<p>You are logged in as an <strong>Admin</strong>. You have full access.</p>";
        // Admin-specific content here.
        break;
    case 'business':
        echo "<p>You are logged in as a <strong>Business Owner</strong>. You have access to your business dashboard.</p>";
        // Business owner-specific content here.
        break;
    default:
        echo "<p>You are logged in as a <strong>User</strong>. Enjoy your stay!</p>";
        // User-specific content here.
}
?>

<?php include '../includes/footer.php'; ?>
