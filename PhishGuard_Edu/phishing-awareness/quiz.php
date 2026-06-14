<?php 
// quiz.php - 10 question awareness quiz
require_once 'includes/header.php'; 
?>

<div class="content-card p-4 mb-5">
    <h2 class="text-primary border-bottom pb-2 mb-4">Phishing Awareness Quiz</h2>
    <p>Test your knowledge. Answer the 10 questions below and submit to see your risk level.</p>

    <form id="quizForm" action="result.php" method="POST">
        
        <!-- User Info -->
        <div class="row mb-4 bg-light p-3 rounded">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="userName" class="form-label fw-bold">Your Name</label>
                <input type="text" class="form-control" id="userName" name="userName" required>
            </div>
            <div class="col-md-6">
                <label for="userEmail" class="form-label fw-bold">Email Address (for dashboard)</label>
                <input type="email" class="form-control" id="userEmail" name="userEmail" required>
            </div>
        </div>

        <hr>

        <?php
        // Array of questions for easy rendering and maintenance
        $questions = [
            [
                "q" => "1. What is the primary goal of a phishing attack?",
                "name" => "q1",
                "options" => [
                    "a" => "To improve network speed",
                    "b" => "To steal sensitive information like passwords and credit card numbers",
                    "c" => "To upgrade your software automatically",
                    "d" => "To clean viruses from your computer"
                ]
            ],
            [
                "q" => "2. Which of the following is a common red flag in a phishing email?",
                "name" => "q2",
                "options" => [
                    "a" => "A generic greeting like 'Dear Customer'",
                    "b" => "Proper spelling and grammar",
                    "c" => "A sender email address that matches the company domain exactly",
                    "d" => "Information about a recent purchase you actually made"
                ]
            ],
            [
                "q" => "3. What does 'HTTPS' indicate in a website URL?",
                "name" => "q3",
                "options" => [
                    "a" => "The website is heavily protected against all hackers",
                    "b" => "The communication between your browser and the website is encrypted",
                    "c" => "The website is guaranteed to not be a phishing site",
                    "d" => "The site is owned by a bank"
                ]
            ],
            [
                "q" => "4. What is 'Spear Phishing'?",
                "name" => "q4",
                "options" => [
                    "a" => "A generic email sent to millions of people",
                    "b" => "A physical security breach at an office",
                    "c" => "A targeted phishing attack aimed at a specific individual or organization",
                    "d" => "A type of firewall"
                ]
            ],
            [
                "q" => "5. If you receive an urgent email from your 'bank' asking to verify your account via a link, you should:",
                "name" => "q5",
                "options" => [
                    "a" => "Click the link immediately to secure your account",
                    "b" => "Reply to the email asking for more details",
                    "c" => "Ignore it, or independently go to the bank's official website by typing the URL yourself",
                    "d" => "Forward it to your friends as a warning"
                ]
            ],
            [
                "q" => "6. Phishing via SMS text messages is commonly known as:",
                "name" => "q6",
                "options" => [
                    "a" => "Vishing",
                    "b" => "Smishing",
                    "c" => "Pharming",
                    "d" => "Spamming"
                ]
            ],
            [
                "q" => "7. An email claiming you've won a lottery you never entered is likely:",
                "name" => "q7",
                "options" => [
                    "a" => "A lucky coincidence",
                    "b" => "A legitimate marketing campaign",
                    "c" => "A phishing or advance-fee scam attempt",
                    "d" => "A message from your employer"
                ]
            ],
            [
                "q" => "8. Why do phishing emails often create a sense of urgency (e.g., 'Your account will be suspended in 24 hours')?",
                "name" => "q8",
                "options" => [
                    "a" => "Because servers delete inactive accounts daily",
                    "b" => "To panic the victim into acting quickly without thinking or verifying",
                    "c" => "It is a legal requirement for notifications",
                    "d" => "To test your typing speed"
                ]
            ],
            [
                "q" => "9. How can you safely check where a hyperlink goes without clicking it?",
                "name" => "q9",
                "options" => [
                    "a" => "Hover your mouse cursor over the link to see the actual URL destination",
                    "b" => "Copy and paste it into a Word document",
                    "c" => "Ask the sender where it goes",
                    "d" => "You cannot check without clicking it"
                ]
            ],
            [
                "q" => "10. What is 'Whaling'?",
                "name" => "q10",
                "options" => [
                    "a" => "Catching large fish",
                    "b" => "A phishing attack specifically targeting high-profile executives (like CEOs)",
                    "c" => "Downloading large files illegally",
                    "d" => "Reporting a phishing attempt to authorities"
                ]
            ]
        ];

        // Loop through and render questions
        foreach ($questions as $index => $item) {
            echo "<div class='mb-4'>";
            echo "<p class='fw-bold mb-2'>" . $item['q'] . "</p>";
            foreach ($item['options'] as $val => $text) {
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='" . $item['name'] . "' id='" . $item['name'] . "_" . $val . "' value='" . $val . "'>";
                echo "<label class='form-check-label' for='" . $item['name'] . "_" . $val . "'>" . $text . "</label>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>

        <div class="mt-4">
            <button type="submit" class="btn btn-success btn-lg px-5">Submit Quiz</button>
        </div>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
