<?php
ob_start();

require_once('db.php');
require_once('auth_session.php');

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    // Prepare a statement to select the user
    $stmt = mysqli_prepare($connection, "SELECT * FROM `users` WHERE username=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
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
            // Prepare a statement to update the failed attempts
            $stmt = mysqli_prepare($connection, "UPDATE `users` SET failed_attempts = failed_attempts + 1 WHERE username=?");
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);

            if ($user['failed_attempts'] + 1 >= 5) {
                // Prepare a statement to update the lockout time
                $stmt = mysqli_prepare($connection, "UPDATE `users` SET lockout_time =? WHERE username=?");
                mysqli_stmt_bind_param($stmt, "is", time(), $username);
                mysqli_stmt_execute($stmt);
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
            window.location.href = 'index.php';
            </script>";

    } else {
        echo "<script type='text/javascript'>
            alert('No user found with that username. Redirecting to login page.');
            window.location.href = 'index.php';
            </script>";
    }
} else {
    include('login_form.html');
}

ob_end_flush();
