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
$meta = [
    'title' => 'Contact Us',
    'description' => 'Welcome to the homepage of my minimalistic website.',
    'keywords' => 'home, minimal, PHP website',
    'author' => 'Your Name'
];
?>
</head>
<body class="light">

<?php include BASE_PATH . '/main/header.php'; ?>

<h1>contact</h1>


<?php include BASE_PATH . '/main/footer.php'; ?>
<?php include BASE_PATH . '/main/copyright.php'; ?>