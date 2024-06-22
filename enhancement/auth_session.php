<?php
session_set_cookie_params([
    'path' => '/',
    'domain' => 'PIXLHUNT.com',
    'secure' => true, 
    'httponly' => true 
]);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    $randomId = uniqid(); 
    $_SESSION['user_id'] = $randomId;
    session_regenerate_id(true); 
}
