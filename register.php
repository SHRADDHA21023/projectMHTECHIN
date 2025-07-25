<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $error = "Phone must be 10 digits.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR phone = ?");
        $stmt->bind_param("ss", $email, $phone);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = "Email or phone already registered.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $phone, $password);
            $stmt->execute();
            $success = "Registered successfully! <a href='login.php'>Login</a>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register - MH Techin</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1950&q=80') no-repeat right center;
            background-size: contain;
            background-color: #f4f7fe;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin-left: 60px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            background: #f9f9f9;
        }

        .input-group .icon {
            margin-right: 10px;
        }

        .input-group input {
            border: none;
            outline: none;
            flex: 1;
            background: transparent;
            font-size: 16px;
        }

        .toggle-password {
            cursor: pointer;
            font-size: 18px;
            margin-left: 8px;
        }

        button {
            width: 100%;
            background: #4a69bd;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #1e3799;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        .error {
            color: red;
            text-align: center;
        }

        .success {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php
        if (isset($error)) echo "<p class='error'>$error</p>";
        if (isset($success)) echo "<p class='success'>$success</p>";
        ?>
        <form method="POST" action="register.php">
            <div class="input-group">
                <span class="icon">👤</span>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <span class="icon">📧</span>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <span class="icon">📱</span>
                <input type="text" name="phone" placeholder="Phone (10 digits)" required>
            </div>

            <div class="input-group">
                <span class="icon">🔒</span>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">👁️</span>
            </div>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
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
