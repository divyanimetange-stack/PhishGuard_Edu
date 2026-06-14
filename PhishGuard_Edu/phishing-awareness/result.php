<?php 
// result.php - Processes quiz submission and displays score
require_once 'includes/db.php';
require_once 'includes/header.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Get User Info
    $name = isset($_POST['userName']) ? trim(htmlspecialchars($_POST['userName'])) : 'Anonymous';
    $email = isset($_POST['userEmail']) ? filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL) : 'unknown@example.com';

    // 2. Define Correct Answers
    $correct_answers = [
        "q1" => "b",
        "q2" => "a",
        "q3" => "b",
        "q4" => "c",
        "q5" => "c",
        "q6" => "b",
        "q7" => "c",
        "q8" => "b",
        "q9" => "a",
        "q10" => "b"
    ];

    // 3. Calculate Score
    $score = 0;
    $total = count($correct_answers);
    
    foreach ($correct_answers as $question => $correct_option) {
        if (isset($_POST[$question]) && $_POST[$question] == $correct_option) {
            $score++;
        }
    }

    // 4. Determine Risk Level
    $risk_level = "";
    $alert_class = "";
    if ($score <= 4) {
        $risk_level = "High Risk";
        $alert_class = "alert-danger";
    } elseif ($score <= 7) {
        $risk_level = "Medium Risk";
        $alert_class = "alert-warning";
    } else {
        $risk_level = "Safe User";
        $alert_class = "alert-success";
    }

    // 5. Save to Database
    $stmt = $conn->prepare("INSERT INTO participants (name, email, quiz_score, risk_level) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $score, $risk_level);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    // 6. Display Results
    ?>
    <div class="row justify-content-center my-5">
        <div class="col-md-8 text-center">
            <h2 class="mb-4">Quiz Results for <?php echo $name; ?></h2>
            
            <div class="display-1 fw-bold text-primary mb-3">
                <?php echo $score; ?> / <?php echo $total; ?>
            </div>
            
            <div class="alert <?php echo $alert_class; ?> fs-4 mb-4">
                Your Security Profile: <strong><?php echo $risk_level; ?></strong>
            </div>

            <div class="card mb-4 text-start">
                <div class="card-body">
                    <h4>What this means:</h4>
                    <?php if ($score <= 4): ?>
                        <p>You might be easily susceptible to phishing attacks. We highly recommend reviewing the <a href="about.php">About</a> and <a href="examples.php">Examples</a> sections again to better understand the red flags.</p>
                    <?php elseif ($score <= 7): ?>
                        <p>You have a good basic understanding, but there are still some areas where a sophisticated attack might trick you. Stay vigilant!</p>
                    <?php else: ?>
                        <p>Excellent! You have a strong grasp of how to identify and avoid phishing attempts. Keep up the good work and always verify before you click.</p>
                    <?php endif; ?>
                </div>
            </div>

            <a href="admin.php" class="btn btn-outline-primary">View Global Dashboard</a>
        </div>
    </div>
    <?php
} else {
    // If someone accesses result.php directly without submitting the form
    echo "<div class='alert alert-warning mt-5'>Please take the <a href='quiz.php'>Quiz</a> first.</div>";
}

require_once 'includes/footer.php'; 
?>
