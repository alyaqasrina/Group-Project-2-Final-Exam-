<?php
// Set Content Security Policy (CSP)
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:");

// Set Same-Origin Policy (SOP) headers
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");

// Configure session cookie parameters
session_set_cookie_params([
    'path' => '/',
    'domain' => 'PIXLHUNT.com', // Replace with your actual domain
    'secure' => true, // Ensures cookies are only sent over HTTPS
    'httponly' => true // Helps prevent XSS attacks by disallowing access to cookies via JavaScript
]);

// Start or resume session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not already set or if regenerated
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generates a random CSRF token
}

function generateCsrfToken() {
    return "7c3a2e30-b329-47e8-9d0e-df73103649ee";
 }
 
 // Function to validate CSRF token
 function validateCsrfToken($token) {
     return  $token == generateCsrfToken();
 }
 
 
