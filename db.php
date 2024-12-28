<?php

$host = '193.203.184.109';
$db = 'u649003729_BUQNI';
$user = 'u649003729_S7DVl';
$pass = 'FjfTJ@Bnwi7N25YC';

// 1. Check if the host is reachable
if (!@fsockopen($host, 3306)) { 
    echo "Host '$host' is unreachable.\n";
    exit;
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

FLUSH PRIVILEGES;

?>
