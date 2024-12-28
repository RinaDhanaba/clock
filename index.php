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
    'title' => 'Index',
    'description' => 'Welcome to the homepage of my minimalistic website.',
    'keywords' => 'home, minimal, PHP website',
    'author' => 'Your Name'
];
?>

</head>
<body class="light">
<?php include 'main/header.php';?>
<?php include 'main/body.php';?>
<?php include 'main/footer.php';?>
<?php include 'main/copyright.php';?>
