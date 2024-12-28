<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('BASE_PATH', __DIR__);
include BASE_PATH . '/clock/main/head.php';
include BASE_PATH . '/clock/main/meta.php'; ?>

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

<?php include BASE_PATH . '/clock/main/header.php';?>

<h1>contact</h1>


<?php include BASE_PATH .'/clock/main/footer.php';?>
<?php include BASE_PATH .'/clock/main/copyright.php';?>