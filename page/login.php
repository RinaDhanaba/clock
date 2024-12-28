
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

    // Check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Store user details in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_group'] = $user['user_group'];

        // Redirect based on user group
        if ($user['user_group'] === 'business_owner') {
            header("Location: business_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
    } else {
        echo "Invalid email or password.";
    }
}
?>

<?php
$meta = [
    'title' => 'login',
    'description' => 'Welcome to the homepage of my minimalistic website.',
    'keywords' => 'home, minimal, PHP website',
    'author' => 'Your Name'
];
?>
</head>
<body class="light">

<?php include BASE_PATH . '/main/header.php'; ?>

<h1>Login</h1>

<form action="login.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Login</button>
</form>


<?php include BASE_PATH . '/main/footer.php'; ?>
<?php include BASE_PATH . '/main/copyright.php'; ?>