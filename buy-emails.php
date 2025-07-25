<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buy Business Emails - MHTECHIN</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 60px auto;
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #2dbbfb;
      margin-bottom: 30px;
    }

    .plans {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .plan {
      border: 1px solid #ccc;
      border-radius: 8px;
      width: 230px;
      padding: 20px;
      margin: 15px;
      text-align: center;
      transition: 0.3s;
    }

    .plan:hover {
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .plan h3 {
      color: #333;
      margin-bottom: 10px;
    }

    .plan p {
      color: #555;
      margin-bottom: 15px;
    }

    .price {
      font-size: 22px;
      font-weight: bold;
      color: #2dbbfb;
    }

    .buy-btn {
      margin-top: 15px;
      padding: 10px 20px;
      background: #2dbbfb;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    .buy-btn:hover {
      background: #1aaae5;
    }

    .back-link {
      text-align: center;
      margin-top: 30px;
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
    <h2>Choose a Business Email Plan</h2>
    <div class="plans">
      <div class="plan">
        <h3>Basic</h3>
        <p>1 Custom Email</p>
        <div class="price">₹99/mo</div>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class="plan">
        <h3>Professional</h3>
        <p>5 Custom Emails</p>
        <div class="price">₹399/mo</div>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class="plan">
        <h3>Enterprise</h3>
        <p>Unlimited Emails</p>
        <div class="price">₹999/mo</div>
        <button class="buy-btn">Buy Now</button>
      </div>
    </div>

    <div class="back-link">
      <a href="login.php">← Back to Login</a>
    </div>
  </div>
</body>
</html>
