<?php
require_once 'db.php';
require_once 'auth_session.php';

if ($connection === null) {
    die("Database connection not established.");
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        // Validate CSRF token
        if (!isset($_POST['csrf_token']) || !validateCsrfToken($_POST['csrf_token'])) {
            die("CSRF token validation failed. <a href='admin.php'>Go back</a>");
        }

        // Sanitize and validate input
        $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
        $role = htmlspecialchars(trim($_POST['role']), ENT_QUOTES, 'UTF-8');
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format. <a href='admin.php'>Go back</a>");
        }

        // Insert user into database
        $sql = "INSERT INTO users (username, email, role, password) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssss", $username, $email, $role, $password);
            $stmt->execute();
            $stmt->close();
            echo "<script>alert('User created successfully.');</script>";
        } else {
            echo "<script>alert('Error preparing statement: " . $connection->error . "');</script>";
        }
    } elseif (isset($_POST['update'])) {
        // Validate CSRF token
        if (!isset($_POST['csrf_token']) || !validateCsrfToken($_POST['csrf_token'])) {
            die("CSRF token validation failed. <a href='admin.php'>Go back</a>");
        }

        // Sanitize and validate input
        $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
        $role = htmlspecialchars(trim($_POST['role']), ENT_QUOTES, 'UTF-8');

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format. <a href='admin.php'>Go back</a>");
        }

        // Update user in database
        $sql = "UPDATE users SET email = ?, role = ? WHERE username = ?";
        $stmt = $connection->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sss", $email, $role, $username);
            $stmt->execute();
            $stmt->close();
            echo "<script>alert('User updated successfully.');</script>";
        } else {
            echo "<script>alert('Error preparing statement: " . $connection->error . "');</script>";
        }
    } elseif (isset($_POST['delete'])) {
        // Validate CSRF token
        if (!isset($_POST['csrf_token']) || !validateCsrfToken($_POST['csrf_token'])) {
            die("CSRF token validation failed. <a href='admin.php'>Go back</a>");
        }

        // Sanitize input
        $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');

        // Delete user from database
        $sql = "DELETE FROM users WHERE username = ?";
        $stmt = $connection->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->close();
            echo "<script>alert('User deleted successfully.');</script>";
        } else {
            echo "<script>alert('Error preparing statement: " . $connection->error . "');</script>";
        }
    }
}

// Fetch and display the list of users
$sql = "SELECT username, email, role FROM users";
$result = $connection->query($sql);

if (!$result) {
    die("Query failed: " . $connection->error);
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
            <a href="./login.php">
                <img src="./media/logo.png" id="logo-nav" alt="PixlHunt Logo">
                PixlHunt
            </a>
        </div>
        <div>
            <a href="./admin.php" class="right">Admin</a>
            <a href="./View/index.php" class="right">Home</a>
            <a href="./View/category.html" class="right">Category</a>
            <a href="./View/aboutUs.html" class="right">About Us</a>
            <a href="./View/contactUs.html" class="right">Contact Us</a>
            <a href="./logout.php" class="right">Logout</a>
        </div>
    </nav>

<h1>Welcome, Admin!</h1>
<div class="admin">
    <div class="section">
        <h3>Create a new user:</h3>
        <form action="" method="post" onsubmit="return validateForm()">
            <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="text" id="role" name="role" placeholder="Role (admin/user)" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="submit" name="create" value="Create">
        </form>
    </div>

    <div class="section"> 
    <h3>Update a user:</h3>
    <form action="" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="email" id="email" name="email" placeholder="New Email">
        <input type="text" id="role" name="role" placeholder="New Role (admin/user)">
        <input type="submit" name="update" value="Update">
    </form>
    </div>

    <div class="section">
    <h3>Delete a user:</h3>
    <form action="" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
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

