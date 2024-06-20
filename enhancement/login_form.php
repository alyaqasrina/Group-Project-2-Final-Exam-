<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

<h1 text-align = "center">Login </h1>
<form action="login.php" method="post" autocomplete="off">
    Username: <input type="username" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Role: <input type="role" name="role" required><br>
    <input type="submit" value="Login"><br>
    <p>New User? <a href="register.php">Register</a></p>
</form>
</body>