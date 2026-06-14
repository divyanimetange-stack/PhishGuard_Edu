// js/main.js
// Custom JavaScript for interactive elements

document.addEventListener("DOMContentLoaded", function() {

    // ---------------------------------------------------------
    // 1. Simulation Page Logic (fake login interception)
    // ---------------------------------------------------------
    const simForm = document.getElementById('simulationForm');
    if (simForm) {
        simForm.addEventListener('submit', function(e) {
            // Prevent actual form submission to keep credentials safe
            e.preventDefault(); 
            
            const emailInput = document.getElementById('email').value;
            
            // Show the educational warning
            document.getElementById('simulationAlert').style.display = 'block';
            document.getElementById('loginFields').style.display = 'none';

            // Send a safe log to the server (only the attempt, NOT the password)
            // This uses the fetch API for a simple AJAX request
            fetch('simulation_log.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=simulation_login_attempt&email=' + encodeURIComponent(emailInput)
            })
            .then(response => response.text())
            .then(data => {
                console.log("Log recorded for dashboard purposes.");
            })
            .catch(error => console.error('Error logging:', error));
        });
    }

    // ---------------------------------------------------------
    // 2. Quiz Validation
    // ---------------------------------------------------------
    const quizForm = document.getElementById('quizForm');
    if (quizForm) {
        quizForm.addEventListener('submit', function(e) {
            // Basic validation to ensure all questions are answered
            // A real app might check all 10, here we do a simple check
            let answered = document.querySelectorAll('input[type="radio"]:checked').length;
            let totalQuestions = 10; // As per requirements
            
            if (answered < totalQuestions) {
                e.preventDefault();
                alert("Please answer all " + totalQuestions + " questions before submitting.");
            }
        });
    }
});
