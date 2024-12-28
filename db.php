<?php

SELECT User, Host FROM mysql.user WHERE User = 'u649003729_S7DVl';
GRANT USAGE ON *.* TO 'u649003729_S7DVl'@'193.203.184.109' IDENTIFIED BY 'FjfTJ@Bnwi7N25YC';
GRANT ALL PRIVILEGES ON u649003729_BUQNI.* TO 'u649003729_S7DVl'@'193.203.184.109';

$host = '193.203.184.109';
$db = 'u649003729_BUQNI';
$user = 'u649003729_S7DVl';
$pass = 'FjfTJ@Bnwi7N25YC';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

FLUSH PRIVILEGES;

?>
