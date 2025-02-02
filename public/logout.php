<?php
// public/logout.php
require_once '../config/config.php';

// Destroy the session
session_start();
session_unset();
session_destroy();

// Redirect to login page
header("Location: login.php");
exit;
