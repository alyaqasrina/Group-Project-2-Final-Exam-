<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require_once 'db.php';
require_once 'auth_session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    $role = trim($_POST["role"]);

    if ($password !== $confirm_password) {
        die("Passwords do not match. <a href='register.php'>Go back</a>");
    }

    if (!empty($username) && !empty($email) && !empty($password)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format.");
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $otp = rand(100000, 999999);

        $_SESSION['temp_user'] = [
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password,
            'role' => $role
        ];
        $_SESSION['otp'] = $otp;
        $_SESSION['mail'] = $email;

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'pixlhunt37@gmail.com';
            $mail->Password = 'absufjinicvsxsbf';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('pixlhunt37@gmail.com', 'PixlHunt');
            $mail->addAddress($email, $username);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body = '<p>Your OTP is: <b style="font-size: 30px;">' . $otp . '</b></p>';

            $mail->send();
            // SQL injection prevention
            $sql = "INSERT INTO users (username, email, password, role, otp, is_verified) VALUES (?, ?, ?, ?, ?, false)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param('sssss', $username, $email, $hashed_password, $role, $otp);
            $stmt->execute();

            header("Location: verification.php");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
    <title>Register Page</title>
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
    <div class="main">
        <h1>Register</h1>
        <form class="form" action="register.php" method="post" autocomplete="off">
            <label for="username"> Username: </label>
            <input class="username" type="text" id="username" name="username" required>
            <label for="email"> Email: </label>
            <input class="email" type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input class="password" type="password" id="password" name="password" required>
            <label for="confirm_password"> Confirm Password: </label>
            <input class="password" type="password" id="confirm_password" name="confirm_password" required>
            <label for="role"> Role: (admin/user) </label>
            <input class="role" type="text" id="role" name="role" required>
            <input class="submit" type="submit" value="Register">
            <p> Already have an account? <a href="login.php">Login</a></p>
        </form> 
    </div>
</body>
</html>
