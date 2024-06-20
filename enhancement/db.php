<?php
$host = 'localhost';
$db   = 'finalExam';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$connection = mysqli_connect('localhost', 'root', '', 'finalExam');
if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>