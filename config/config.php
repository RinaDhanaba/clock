<?php
// config/config.php

// Application base URL (adjust to your domain/path)
define('BASE_URL', 'https://clock.wdfreelancer.com/');

// Database settings
define('DB_HOST', '127.0.0.1:3306');
define('DB_USER', 'u649003729_S7DVl');
define('DB_PASS', 'FjfTJ@Bnwi7N25YC');
define('DB_NAME', 'u649003729_BUQNI');

// Google API settings (replace with your actual Google client ID and secret)
define('GOOGLE_CLIENT_ID', '963000999551-mgcts123rbbjj44e8ebakdctdf3attsc.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', ' ');
define('GOOGLE_REDIRECT_URI', BASE_URL . 'google-callback.php');

// Other settings
session_start();
