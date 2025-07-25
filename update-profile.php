<?php
include('db.php');
session_start();
$userId = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    // Validate phone number
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        echo "Invalid phone number format.";
    } else {
        // Update profile details in the database
        $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, phone = ?, date_of_birth = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $first_name, $last_name, $phone, $dob, $userId);
        $stmt->execute();
        echo "Profile updated successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Profile</h2>
        <form method="POST" action="update-profile.php">
            First Name: <input type="text" name="first_name" required><br>
            Last Name: <input type="text" name="last_name" required><br>
            Phone: <input type="text" name="phone" required><br>
            Date of Birth: <input type="date" name="dob" required><br>
            <button type="submit">Update Profile</button>
        </form>
        <p><a href="logout.php">Log Out</a></p>
    </div>
</body>
</html>
