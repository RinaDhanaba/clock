<?php
// public/change_role.php

require_once '../config/config.php';
require_once '../config/db.php';
require_once '../includes/auth.php';

// Ensure the user is logged in.
require_login();

// For this example, we allow the logged-in user to change their own role.
// (In production, you would normally not allow users to elevate privileges arbitrarily.)
$user_id = $_SESSION['user']['id'];

// Retrieve the current user's data from the database.
$sql = "SELECT id, name, email, role FROM users WHERE id = $user_id LIMIT 1";
$result = $mysqli->query($sql);
if (!$result || $result->num_rows === 0) {
    die("User not found.");
}
$user = $result->fetch_assoc();

$message = '';

// Process form submission.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['role'])) {
    $new_role = trim($_POST['role']);

    // Define allowed roles.
    $allowed_roles = ['admin', 'business', 'user'];

    if (!in_array($new_role, $allowed_roles)) {
        $message = "Invalid role selected.";
    } else {
        // Update the user's role using a prepared statement.
        $stmt = $mysqli->prepare("UPDATE users SET role = ? WHERE id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $mysqli->error);
        }
        $stmt->bind_param("si", $new_role, $user_id);
        if ($stmt->execute()) {
            $message = "Your role has been updated successfully.";
            // Update the role stored in the session.
            $_SESSION['user']['role'] = $new_role;
            $user['role'] = $new_role;
        } else {
            $message = "Error updating role: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2 class="mb-3">Change Your Role</h2>

        <?php if ($message): ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <p><strong>Current Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>

        <form method="post" action="change_role">
            <div class="mb-3">
                <label for="role" class="form-label">Select New Role</label>
                <select name="role" id="role" class="form-select" required>
                    <!-- Mark the current role as selected. -->
                    <option value="admin" <?php echo ($user['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="business" <?php echo ($user['role'] === 'business') ? 'selected' : ''; ?>>Business Owner</option>
                    <option value="user" <?php echo ($user['role'] === 'user') ? 'selected' : ''; ?>>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Change Role</button>
        </form>
        <hr>
        <p>
            <a href="index">Return to Dashboard</a>
        </p>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
