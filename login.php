<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
    $stmt->bind_param("ss", $email, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $error = "User not found.";
    } else {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: update-profile.php");
            exit;
        } else {
            $error = "Incorrect password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - SBTECH</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .container img {
            width: 80px;
            margin-bottom: 20px;
        }

        .input-group,
        .password-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            overflow: hidden;
        }

        .input-group span,
        .password-container .icon,
        .toggle-password {
            padding: 10px;
            background: #f1f1f1;
        }

        .input-group input,
        .password-container input {
            border: none;
            padding: 10px;
            width: 100%;
            outline: none;
        }

        button {
            width: 100%;
            background: #2dbbfb;
            color: white;
            border: none;
            padding: 12px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #1aaae5;
        }

        .support {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }

        .support a {
            color: #007bff;
            text-decoration: none;
        }

        .support a:hover {
            text-decoration: underline;
        }

        .buy-button {
            margin-top: 15px;
            background: #f1f3f5;
            color: #000;
            padding: 10px;
            border-radius: 6px;
            display: inline-block;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .register {
            margin-top: 10px;
            font-size: 14px;
        }

        .register a {
            text-decoration: none;
            color: #2dbbfb;
        }
    </style>
</head>
<body>
<div class="container">
    <img src="https://images.crunchbase.com/image/upload/c_lpad,h_256,w_256,f_auto,q_auto:eco,dpr_1/olsijxbmu8jrrgxbon45" alt="Logo">

    <h2>Login</h2>

    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>

    <form method="POST" action="">
        <!-- Username/Email/Phone -->
        <div class="input-group">
            <span>👤</span>
            <input type="text" name="email" placeholder="Email or Phone" required
                   pattern="^(\+?\d{10,15}|[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$"
                   title="Enter a valid email or phone number">
        </div>

        <!-- Password -->
        <div class="password-container">
            <span class="icon">🔒</span>
            <input type="password" name="password" id="password" placeholder="Password" required
                   pattern=".{6,}" title="Password must be at least 6 characters">
            <span class="toggle-password" onclick="togglePassword()">👁️</span>
        </div>

        <!-- Submit Button -->
        <button type="submit">LOGIN</button>
    </form>

    <!-- Support and Register -->
    <div class="support">
        SBTECH • <a href="support.php">Get support</a>
    </div>

    <a class="buy-button" href="buy-emails.php">Buy Business Emails</a>

    <div class="register">
        Don't have an account? <a href="register.php">Register here</a>
    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById("password");
        const icon = document.querySelector(".toggle-password");
        if (password.type === "password") {
            password.type = "text";
            icon.textContent = "🙈";
        } else {
            password.type = "password";
            icon.textContent = "👁️";
        }
    }
</script>
</body>
</html>
