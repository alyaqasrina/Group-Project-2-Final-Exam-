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

    if (!empty($username) && !empty($email) && !empty($password)) {
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
            $mail->Password = 'absufjinicvsxsbf'; // Use a secure method to store credentials
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('pixlhunt37@gmail.com', 'PixlHunt');
            $mail->addAddress($email, $username);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body = '<p>Your OTP is: <b style="font-size: 30px;">' . htmlspecialchars($otp, ENT_QUOTES, 'UTF-8') . '</b></p>';

            $mail->send();

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
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAfter.css">
    <link rel="stylesheet" href="style2.css" />
    <title>Admin Page</title>
    <style>
        /* Your existing styles */
        h1 {
            text-align: center;
            font-family: 'Playfair Display', serif;
        }

        .admin {
            padding: 20px;
            font-family: 'Playfair Display', serif;
            display: flex;
            justify-content: left;
            align-items: center;
            flex-direction: column;
            gap: 20px;
            cursor: default;
        }

        .section {
            border: 1px solid #333;
            padding: 20px;
            border-radius: 5px;
            width: 70%;
            gap: 20px;
            font-size: medium;
        }

        .input {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: large;
            align-items: center;
        }

        th, td {
            text-align: center;
            font-size: 15px;
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

            // Validation checks
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
    <nav class="navbar">
        <div class="navbar-one">
            <a href="./loign.php">
                <img src="./media/logo.png" id="logo-nav" alt="PixlHunt Logo">
                PixlHunt
            </a>
        </div>
        <div>
            <a href="./admin.php" class="right">Admin</a>
            <a href="./view/homepage.php" class="right">Home</a>
            <a href="./view/category.html" class="right">Category</a>
            <a href="./view/aboutUs.html" class="right">About Us</a>
            <a href="./view/contactUs.html" class="right">Contact Us</a>
            <a href="./logout.php" class="right">Logout</a>
           
        </div>
    </nav>

    <h1>Welcome, Admin!</h1>
    <div class="admin">
        <div class="section">
            <h3>Create a new user:</h3>
            <form action="" method="post" onsubmit="return validateForm()">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="text" id="role" name="role" placeholder="Role" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                <input type="submit" name="create" value="Create">
            </form>
        </div>

        <div class="section"> 
            <h3>Update a user:</h3>
            <form action="" method="post" onsubmit="return validateForm()">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="email" id="email" name="email" placeholder="New Email">
                <input type="text" id="role" name="role" placeholder="New Role">
                <input type="submit" name="update" value="Update">
            </form>
        </div>

        <div class="section">
            <h3>Delete a user:</h3>
            <form action="" method="post" onsubmit="return validateForm()">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="submit" name="delete" value="Delete">
            </form>
        </div>

        <div class="section">
            <h3>List of users:</h3>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>

                <?php
                // PHP code for fetching and displaying users
                require_once 'db.php';

                $sql = "SELECT username, email, role FROM users";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["username"], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . htmlspecialchars($row["role"], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No users found</td></tr>";
                }

                $connection->close();
                ?>
            </table> 
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAfter.css">
    <link rel="stylesheet" href="style2.css" />
    <title>Admin Page</title>
    <style>
        /* Your existing styles */
    </style>
    <script>
        function validateForm(form) {
            const username = form.username.value.trim();
            const email = form.email.value.trim();
            const role = form.role.value.trim();
            const password = form.password ? form.password.value.trim() : null;
            
            if (username === "" || email === "" || role === "" || (password !== null && password === "")) {
                alert("All fields are required.");
                return false;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<nav class="navbar">
        <div class="navbar-one">
            <a href="./index.php">
                <img src="./media/logo.png" id="logo-nav" alt="PixlHunt Logo">
                PixlHunt
            </a>
        </div>
        <div>
            <a href="./admin.php" class="right">Admin</a>
            <a href="./homepage.php" class="right">Home</a>
            <a href="./category.html" class="right">Category</a>
            <a href="./aboutUs.html" class="right">About Us</a>
            <a href="./contactUs.html" class="right">Contact Us</a>
            <a href="./logout.php" class="right">Logout</a>
        </div>
    </nav>

<h1>Welcome, Admin!</h1>
<div class="admin">
    <div class="section">
        <h3>Create a new user:</h3>
        <form action="" method="post" onsubmit="return validateForm(this);">
            <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="role" placeholder="Role" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="create" value="Create">
        </form>
    </div>

    <div class="section"> 
    <h3>Update a user:</h3>
    <form action="" method="post" onsubmit="return validateForm(this);">
        <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="New Email">
        <input type="text" name="role" placeholder="New Role">
        <input type="submit" name="update" value="Update">
    </form>
    </div>

    <div class="section">
    <h3>Delete a user:</h3>
    <form action="" method="post" onsubmit="return validateForm(this);">
        <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="submit" name="delete" value="Delete">
    </form>
    </div>

    <div class="section">
    <h3>List of users:</h3>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
        </tr>

        <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["username"], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row["role"], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "</tr>";
            }
        ?>
    </table> 
    </div>
</div>
</body>
</html>
