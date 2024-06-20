<?php
require_once 'auth_session.php';
require_once 'db.php';

if (isset($_POST["verify"])) {
    $email = $_SESSION['mail'];
    $otp_code = trim($_POST['otp_code']);

    // Retrieve OTP from the database for the specified email
    $sql = "SELECT otp FROM users WHERE email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($stored_otp);
    $stmt->fetch();
    $stmt->close();

    // Debugging statements
    error_log("Stored OTP from DB: " . $stored_otp);
    error_log("Entered OTP: " . $otp_code);
    error_log("Email: " . $email);

    if ($stored_otp != $otp_code) {
        echo "<script>alert('Invalid OTP code');</script>";
    } else {
        // Update user verification status
        $sql = "UPDATE users SET is_verified = 1 WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        // Check if update was successful
        if ($stmt->affected_rows > 0) {
            // Clear the temp_user data and OTP from the session
            unset($_SESSION['temp_user']);
            unset($_SESSION['otp']);
            unset($_SESSION['mail']);

            echo "<script>
                alert('Account verified successfully. You may sign in now.');
                window.location.replace('login.php');
            </script>";
        } else {
            echo "<script>alert('Failed to verify account. Please try again.');</script>";
        }
    }
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
    <link rel="stylesheet" href="style.css">
    <title>Verification</title>
</head>
<body>
    <h1>Verification</h1>
    <form action="verification.php" method="post">
        <input type="text" name="otp_code" placeholder="Enter OTP code" required>
        <input type="submit" name="verify" value="Verify">
    </form>
</body>
</html>
