<?php
include('auth_Session.php');
session_start();
session_unset();
session_destroy();
echo "You have been logged out.";
header("Location: login.php");
exit();
?>
