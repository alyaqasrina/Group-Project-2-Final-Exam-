<?php
require_once('db.php');
require_once('auth_session.php');

// Generate CSRF token if not present
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Invalid CSRF token. Please try again.");
    }

    if (isset($_POST['email']) && isset($_POST['new_password'])) {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $new_password = htmlspecialchars(trim($_POST['new_password']), ENT_QUOTES, 'UTF-8');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format.");
        }

        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);
        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('Your password has been updated. Redirecting to login page.');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script type='text/javascript'>
                    alert('Error updating password. Please try again.');
                  </script>";
        }
    }
} else {
    // Show the reset password form
    echo '<h1>Reset Password</h1>
    <form action="resetPassword.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') . '">
            <input type="submit" value="Reset Password">
          </form>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Reset Password Page</title>
    <style>
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #333;
            border-radius: 5px;
            width: 50%;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }
        input[type="submit"] {
            width: 100%;
            margin-top: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
</body>
</html>
