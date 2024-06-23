<?php
$hostName = "127.0.0.1";
$dbUser = "root";
$dbPassword = "";
$dbName = "finalexam";

// Create connection
$connection = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
