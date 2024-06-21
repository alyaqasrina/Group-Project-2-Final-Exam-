<?php
ob_start();

require_once('db.php');
require_once('auth_session.php');

// Login script 
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind, useful for sql injection prevention
    $stmt = $connection->prepare("SELECT * FROM `users` WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->num_rows;
    if ($rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            echo 'Session variables set: ', var_dump($_SESSION);
            if ($_SESSION['role'] == 'admin') {
                header("Location: admin.php");
                exit();
            } else {
               header("Location: login.php");
                exit();
            }
        } else {
            // Increment failed attempts and set lockout time if necessary
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
    include('login_form.php');
}

// End output buffering and flush output
ob_end_flush();

?>
