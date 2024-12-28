<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" href="styles.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style/global.css">
<script src="script/global.js" defer></script>

<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_group'] !== 'business_owner') {
    header("Location: /login");
    exit;
}
?>