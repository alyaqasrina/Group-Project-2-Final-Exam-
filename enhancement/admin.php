<?php
require_once 'db.php';
require_once 'auth_session.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        // Create a new user
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, role, password) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $role, $password);
        $stmt->execute();
        echo "<script>alert('User created successfully.');</script>";
    } elseif (isset($_POST['update'])) {
        // Update an existing user
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $sql = "UPDATE users SET email = ?, role = ? WHERE username = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $email, $role, $username);
        $stmt->execute();
        echo "<script>alert('User updated successfully.');</script>";
    } elseif (isset($_POST['delete'])) {
        // Delete a user
        $username = $_POST['username'];

        $sql = "DELETE FROM users WHERE username = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        echo "<script>alert('User deleted successfully.');</script>";
    }
}

// Fetch and display the list of users
$sql = "SELECT username, email, role FROM users";
$result = $connection->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAfter.css">
    <title>Admin Page</title>
    <style>

        h1{
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
            <a href="./index.php" class="right">Home</a>
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
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="role" placeholder="Role" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="create" value="Create">
        </form>
    </div>

    <div class="section"> 
    <h3>Update a user:</h3>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="New Email">
        <input type="text" name="role" placeholder="New Role">
        <input type="submit" name="update" value="Update">
    </form>
    </div>

    <div class="section">
    <h3>Delete a user:</h3>
    <form action="" method="post">
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
            // Fetch and display the list of users
            $sql = "SELECT username, email, role FROM users";
            $result = $connection->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "</tr>";
            }
        ?>
    </table> 
    </div>
</div>
</body>
</html>
