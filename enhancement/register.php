<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require_once 'db.php';
require_once 'auth_session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $username = htmlspecialchars(trim($_POST["username"]), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST["email"]), ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars(trim($_POST["password"]), ENT_QUOTES, 'UTF-8');
    $confirm_password = htmlspecialchars(trim($_POST["confirm_password"]), ENT_QUOTES, 'UTF-8');
    $role = htmlspecialchars(trim($_POST["role"]), ENT_QUOTES, 'UTF-8');

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format. <a href='register.php'>Go back</a>");
    }

    // Validate role
    if ($role !== 'admin' && $role !== 'user') {
        die("Role must be either 'admin' or 'user'. <a href='register.php'>Go back</a>");
    }

    // Validate password match
    if ($password !== $confirm_password) {
        die("Passwords do not match. <a href='register.php'>Go back</a>");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Generate OTP
    $otp = rand(100000, 999999);

    // Store user data and OTP in session for verification
    $_SESSION['temp_user'] = [
        'username' => $username,
        'email' => $email,
        'password' => $hashed_password,
        'role' => $role
    ];
    $_SESSION['otp'] = $otp;
    $_SESSION['mail'] = $email;

    // Send verification email
    $mail = new PHPMailer(true);

    try {
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
        $mail->Body = '<p>Your OTP is: <b style="font-size: 30px;">' . htmlspecialchars($otp, ENT_QUOTES, 'UTF-8') . '</b></p>';

        $mail->send();

        // Insert user data into database
        $sql = "INSERT INTO users (username, email, password, role, otp, is_verified) VALUES (?, ?, ?, ?, ?, false)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('sssss', $username, $email, $hashed_password, $role, $otp);
        $stmt->execute();

        header("Location: verification.php");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: " . htmlspecialchars($mail->ErrorInfo, ENT_QUOTES, 'UTF-8');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <script>
        function validateForm() {
            const username = document.getElementById('username').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const confirmPassword = document.getElementById('confirm_password').value.trim();
            const role = document.getElementById('role').value.trim();

            const usernamePattern = /^[a-zA-Z0-9_]{3,16}$/;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const passwordPattern = /^.{6,}$/;
            const rolePattern = /^(admin|user)$/;

            if (!username || !email || !password || !confirmPassword || !role) {
                alert("All fields are required.");
                return false;
            }

            if (!usernamePattern.test(username)) {
                alert("Username must be 3-16 characters long and can include letters, numbers, and underscores.");
                return false;
            }

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (!passwordPattern.test(password)) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            if (!rolePattern.test(role)) {
                alert("Role must be either 'admin' or 'user'.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <div class="main">
        <h1>Register</h1>
        <form class="form" action="register.php" method="post" autocomplete="off" onsubmit="return validateForm();">
            <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
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
