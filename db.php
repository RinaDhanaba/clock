<?php
$host = 'srv1552.hstgr.io';
$db = 'u649003729_BUQNI';
$user = 'u649003729_S7DVl';
$pass = 'FjfTJ@Bnwi7N25YC';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
