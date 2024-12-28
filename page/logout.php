<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log out</title>
</head>
<body>
   
<h1>Log Out</h1>

<?php
session_start();
session_destroy();
header("Location: login.php?message=Logged out successfully.");
exit;
?> 
</body>
</html>

