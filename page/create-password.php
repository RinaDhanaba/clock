
<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the base path one level up from 'page'
define('BASE_PATH', dirname(__DIR__));

// Include files using the corrected path
include BASE_PATH . '/main/head.php';
include BASE_PATH . '/main/meta.php';
?>
<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        die("Email and password are required.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Update the user's password
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->execute([$hashed_password, $email]);

    echo "Password created successfully. You can now log in.";
}
?>

<?php
$meta = [
    'title' => 'create password',
    'description' => 'Welcome to the homepage of my minimalistic website.',
    'keywords' => 'home, minimal, PHP website',
    'author' => 'Your Name'
];
?>
</head>
<body class="light">

<?php include BASE_PATH . '/main/header.php'; ?>

<h1>Create password</h1>

<form action="create-password.php" method="POST">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
    <label for="password">New Password:</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Set Password</button>
</form>


<?php include BASE_PATH . '/main/footer.php'; ?>
<?php include BASE_PATH . '/main/copyright.php'; ?>