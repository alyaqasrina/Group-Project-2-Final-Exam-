<?php
session_set_cookie_params([
    'path' => '/',
    'domain' => 'PIXLHUNT.com',
    'secure' => true, // Ensures the cookie is only sent over HTTPS
    'httponly' => true // Mitigates XSS attacks by preventing access to session cookie via JavaScript
]);

// Start or resume the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Generate a new session ID only if it's not already set
if (!isset($_SESSION['user_id'])) {
    $randomId = uniqid(); // Generate a random session ID
    $_SESSION['user_id'] = $randomId; // Store the session ID in the session
    session_regenerate_id(true); // Assign a new session ID while keeping the current session information
}