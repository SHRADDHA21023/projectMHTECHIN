<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Support - MHTECHIN</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #2dbbfb, #8a2be2);
      color: #fff;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 700px;
      margin: 60px auto;
      background: #fff;
      color: #333;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    h2 {
      color: #2dbbfb;
      text-align: center;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: bold;
      margin-top: 10px;
    }

    input, textarea {
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    button {
      background: #2dbbfb;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      margin-top: 20px;
      cursor: pointer;
    }

    button:hover {
      background: #1aaae5;
    }

    .back-link {
      text-align: center;
      margin-top: 20px;
    }

    .back-link a {
      color: #2dbbfb;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Need Help? Contact Support</h2>
    <form action="#" method="POST">
      <label for="name">Your Name</label>
      <input type="text" id="name" name="name" placeholder="Enter your name" required>

      <label for="email">Your Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <label for="message">Your Message</label>
      <textarea id="message" name="message" rows="5" placeholder="Describe your issue or question..." required></textarea>

      <button type="submit">Submit Request</button>
    </form>

    <div class="back-link">
      <a href="login.php">← Back to Login</a>
    </div>
  </div>
</body>
</html>
