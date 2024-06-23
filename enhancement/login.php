<?php
ob_start();

require_once('db.php');
require_once('auth_session.php');

if (isset($_POST['username'], $_POST['password'])) {
    $username = stripslashes($_REQUEST['username']);    
    $username = mysqli_real_escape_string($connection, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT * FROM `users` WHERE username='$username'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            echo 'Session variables set: ', var_dump($_SESSION);
            if ($_SESSION['role'] == 'admin') {
                header("Location: admin.php");
                exit();
            } else {
                header("Location: homepage.php");
                exit();
            }
        } else {
            $query = "UPDATE `users` SET failed_attempts = failed_attempts + 1 WHERE username='$username'";
            mysqli_query($connection, $query) or die(mysqli_error($connection));
            if ($user['failed_attempts'] + 1 >= 5) {
                $query = "UPDATE `users` SET lockout_time = " . time() . " WHERE username='$username'";
                mysqli_query($connection, $query) or die(mysqli_error($connection));
                 // Redirect to resetPassword.php
                echo "<script type='text/javascript'>
                alert('You have reached the maximum number of failed attempts. Redirecting to password reset page.');
                window.location.href = 'resetPassword.php';
                </script>";
                exit();
            }
        }
            echo "<script type='text/javascript'>
                alert('Password is incorrect. Redirecting to login page.');
                window.location.href = 'login.php';
                </script>";

    } else {
        echo "<script type='text/javascript'>
            alert('No user found with that username. Redirecting to login page.');
            window.location.href = 'login.php';
            </script>";
    }
}else {
    include('login_form.html');
}

ob_end_flush();

