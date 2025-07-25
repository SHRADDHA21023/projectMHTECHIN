<?php
// This page will serve as the landing page for users.
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: update-profile.php"); // Redirect to profile update page if logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome | SBTECH.</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .welcome-container {
      display: flex;
      height: 100vh;
      background: url('https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1950&q=80') no-repeat center center/cover;
      color: #fff;
    }

    .text-side {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 60px;
      backdrop-filter: blur(2px);
      animation: slideInLeft 1.2s ease-out;
    }

    .text-side h1 {
      font-size: 48px;
      margin-bottom: 20px;
      color: #fff;
      animation: fadeInUp 1s ease-in-out;
    }

    .text-side span {
      color: #ffd700;
    }

    .text-side p {
      font-size: 20px;
      line-height: 1.6;
      max-width: 500px;
      animation: fadeInUp 1.5s ease-in-out;
    }

    .login-side {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      background: rgba(255, 255, 255, 0.9);
      color: #333;
      animation: slideInRight 1.5s ease-out;
    }

    .login-box {
      text-align: center;
      padding: 40px;
      border-radius: 12px;
      width: 100%;
      max-width: 350px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      background: #fff;
      animation: fadeIn 2s ease;
    }

    .login-box img {
      width: 100px;
      margin-bottom: 20px;
      animation: fadeInZoom 1.3s ease;
    }

    .login-box h2 {
      margin-bottom: 10px;
      color: #2575fc;
      animation: fadeInUp 1.5s ease;
    }

    .login-box p {
      margin-bottom: 20px;
      font-size: 16px;
      animation: fadeInUp 1.8s ease;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      animation: fadeInUp 2s ease;
    }

    .btn {
      padding: 12px 20px;
      background-color: #2575fc;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      transition: 0.3s;
      flex: 1;
      text-align: center;
    }

    .btn:hover {
      background-color: #1b5fd0;
    }

    /* Animations */
    @keyframes slideInLeft {
      from {
        transform: translateX(-100px);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes slideInRight {
      from {
        transform: translateX(100px);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @keyframes fadeInZoom {
      from {
        opacity: 0;
        transform: scale(0.8);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    @keyframes fadeInUp {
      from {
        transform: translateY(30px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @media screen and (max-width: 768px) {
      .welcome-container {
        flex-direction: column;
      }

      .text-side, .login-side {
        flex: none;
        width: 100%;
        padding: 30px;
      }

      .btn-group {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="welcome-container">
    <div class="text-side">
      <h1>Welcome to <span>SBTECH.</span></h1>
      <p >Your gateway to technology and innovation starts here.</p>
    </div>
    <div class="login-side">
      <div class="login-box">
        <img src="https://images.crunchbase.com/image/upload/c_lpad,h_256,w_256,f_auto,q_auto:eco,dpr_1/olsijxbmu8jrrgxbon45" alt="MHTechin Logo" />
        <h2>Hello There!</h2>
        <p>Please login or register to continue</p>
        <div class="btn-group">
          <a href="login.php" class="btn">Login</a>
          <a href="register.php" class="btn">Register</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
