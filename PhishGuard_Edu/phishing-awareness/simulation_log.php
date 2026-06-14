<?php
// simulation_log.php - Handles AJAX request from simulation.php safely
require_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'simulation_login_attempt') {
    
    // Sanitize the email just to be safe, though it's dummy data
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : 'unknown';
    $ip = $_SERVER['REMOTE_ADDR']; // Basic IP for realistic dashboard stats
    $event = 'simulation_login_attempt';

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO simulation_logs (event_type, user_email_used, ip_address) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $event, $email, $ip);
    
    if($stmt->execute()){
        echo "Log recorded successfully.";
    } else {
        echo "Error recording log.";
    }
    
    $stmt->close();
    $conn->close();
}
?>
