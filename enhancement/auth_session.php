<?php
// Set Content Security Policy (CSP)
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:;");

// Set Same-Origin Policy (SOP) headers
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");

// Configure session cookie parameters
session_set_cookie_params([
    'path' => '/',
    'domain' => 'PIXLHUNT.com',
    'secure' => true,
    'httponly' => true
]);

// Start or resume session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Generate a unique user ID if not set
if (!isset($_SESSION['user_id'])) {
    $randomId = uniqid();
    $_SESSION['user_id'] = $randomId;
    session_regenerate_id(true);
}

// Generate CSRF token if not already set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Function to generate CSRF token
function generateCsrfToken() {
    return $_SESSION['csrf_token'];
}

// Function to validate CSRF token
function validateCsrfToken($token) {
    return hash_equals($_SESSION['csrf_token'], $token);
}
?>
