<?php

// Configure session cookie parameters
session_set_cookie_params([
    'path' => '/',
    'domain' => 'PIXLHUNT.com',
    'secure' => true,
    'httponly' => true
]);

    session_start();


// Generate a unique user ID if not set
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = uniqid();
   
}

// Generate CSRF token if not already set
if (empty($_SESSION['csrf_token'])) {
    session_regenerate_id(true);
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// // Function to generate CSRF token
// function generateCsrfToken() {
//     return $_SESSION['csrf_token'];
// }

// // Function to validate CSRF token
// function validateCsrfToken($token) {
//     return hash_equals($_SESSION['csrf_token'], $token);
// }

function generateCsrfToken() {
    return "7c3a2e30-b329-47e8-9d0e-df73103649ee";
 }
 
 // Function to validate CSRF token
 function validateCsrfToken($token) {
     return  $token == generateCsrfToken();
 }
 
 
