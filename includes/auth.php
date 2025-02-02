<?php
// includes/auth.php

// Ensure session is started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * Check if a user is logged in.
 *
 * @return bool
 */
function is_logged_in() {
    return isset($_SESSION['user']);
}

/**
 * Require login to access a page.
 */
function require_login() {
    if (!is_logged_in()) {
        header("Location: login.php");
        exit;
    }
}

/**
 * Check if a user has a specific role.
 * 
 * @param string|array $role A role string or an array of allowed roles.
 * @return bool
 */
function has_role($role) {
    if (!is_logged_in()) {
        return false;
    }
    
    $user_role = $_SESSION['user']['role'];
    
    if (is_array($role)) {
        return in_array($user_role, $role);
    } else {
        return ($user_role === $role);
    }
}
