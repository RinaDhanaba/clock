<?php
// public/register.php
require_once '../config/config.php';
require_once '../config/db.php';
require_once '../includes/auth.php';

// If user is already logged in, redirect to dashboard
if (is_logged_in()) {
    header("Location: index.php");
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and trim form inputs
    $name             = trim($_POST['name']);
    $email            = trim($_POST['email']);
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate input fields
    if(empty($name) || empty($email) || empty($password) || empty($confirm_password)){
       $message = "All fields are required.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $message = "Invalid email address.";
    } elseif($password !== $confirm_password){
       $message = "Passwords do not match.";
    } else {
       // Check if the email already exists
       $email_esc = $mysqli->real_escape_string($email);
       $checkSql = "SELECT id FROM users WHERE email = '$email_esc' LIMIT 1";
       $result = $mysqli->query($checkSql);
       if($result && $result->num_rows > 0){
          $message = "Email already registered. Please use another email or log in.";
       } else {
          // Insert new user record using password_hash for security
          $name_esc      = $mysqli->real_escape_string($name);
          $password_hash = password_hash($password, PASSWORD_DEFAULT);
          // Default role is 'user'. You can adjust this or provide a selection if needed.
          $role = 'user';
          
          $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name_esc', '$email_esc', '$password_hash', '$role')";
          if($mysqli->query($sql)){
             // Registration successful. Log the user in automatically.
             $_SESSION['user'] = [
                'id'    => $mysqli->insert_id,
                'name'  => $name,
                'email' => $email,
                'role'  => $role
             ];
             header("Location: index.php");
             exit;
          } else {
             $message = "Registration failed. Please try again.";
          }
       }
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-3">Register</h2>
        <?php if ($message): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="post" action="register.php">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" required autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <hr>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
