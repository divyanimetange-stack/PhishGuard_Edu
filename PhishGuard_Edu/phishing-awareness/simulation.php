<?php 
// simulation.php - The educational fake login page
require_once 'includes/header.php'; 
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <!-- This alert is hidden initially, shown via JavaScript on submit -->
            <div id="simulationAlert" class="alert alert-danger simulation-alert text-center">
                <h4 class="alert-heading">⚠️ This was a Phishing Simulation!</h4>
                <p>If this had been a real phishing attack, your credentials would now be stolen.</p>
                <hr>
                <p class="mb-0"><strong>Educational Note:</strong> Never enter your credentials on suspicious websites. Always verify the URL and ensure the site is legitimate. <em>No data you just entered was saved.</em></p>
                <div class="mt-3">
                    <a href="quiz.php" class="btn btn-outline-danger">Proceed to Quiz</a>
                </div>
            </div>

            <!-- Fake Login Form -->
            <div id="loginFields" class="fake-login-container">
                <div class="fake-login-logo">
                    <!-- Generic Education Portal Logo -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a2 2 0 0 0-2-2V6.739l1.286-.515a.5.5 0 0 0 .025-.917z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
                    </svg>
                    <h3 class="mt-2">University Portal Login</h3>
                    <p class="text-muted small">Sign in to access your student dashboard</p>
                </div>
                
                <!-- Notice the form doesn't have an action attribute targeting a PHP script for processing passwords -->
                <form id="simulationForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Student Email / ID</label>
                        <input type="email" class="form-control" id="email" required placeholder="student@university.edu">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required>
                        <div class="form-text">Never share your password.</div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Login</button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
