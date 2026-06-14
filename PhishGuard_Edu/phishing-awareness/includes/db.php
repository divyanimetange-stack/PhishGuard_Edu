<?php
// includes/db.php
// Simple Database Connection File for MCA Project

$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password is empty
$dbname = "phishing_awareness";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // In a real production app we wouldn't show this error, but for a student project it helps debugging
    die("Connection failed: " . $conn->connect_error . " <br> Please ensure XAMPP MySQL is running and the database 'phishing_awareness' is imported.");
}
?>
