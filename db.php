<?php
$host = "localhost"; // Server is localhost
$dbname = "login_system"; // Name of the database
$user = "root"; // Default XAMPP MySQL username
$pass = ""; // Default XAMPP MySQL password is empty

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
