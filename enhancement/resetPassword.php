<?php
require_once('db.php');
require_once('auth_session.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['new_password'])) {
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();

        echo "<script type='text/javascript'>
                alert('Your password has been updated. Redirecting to login page.');
                window.location.href = 'index.php';
              </script>";
    }
} else {
    echo '<h1>Reset Password</h1>
    <form action="resetPassword.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="new_password" placeholder="New Password" required>
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
