<?php 
// examples.php - Visual examples of phishing
require_once 'includes/header.php'; 
?>

<div class="content-card p-4 p-md-5 mb-5">
    <h2 class="text-primary border-bottom pb-2 mb-4">Spot the Red Flags</h2>
    <p class="lead">Review these examples of common phishing techniques to learn how to identify malicious intent.</p>

    <div class="row mt-5">
        <div class="col-lg-6 mb-4">
            <h4>Example 1: The Urgent Account Update</h4>
            <div class="card bg-light border-danger">
                <div class="card-body">
                    <p class="mb-1"><strong>From:</strong> Security Alert &lt;security-update@paypa1.com&gt;</p>
                    <p class="mb-3 border-bottom pb-2"><strong>Subject:</strong> URGENT: Your Account Has Been Limited</p>
                    <p>Dear Customer,</p>
                    <p>We noticed unusual activity on your account. To protect your funds, your account has been temporarily restricted.</p>
                    <p>Please click the link below to verify your identity within 24 hours, or your account will be permanently closed.</p>
                    <a href="#" class="btn btn-primary disabled mb-3" aria-disabled="true">Verify Account Now</a>
                    <p class="text-muted small">Sincerely,<br>The Security Team</p>
                </div>
            </div>
            <ul class="text-danger mt-3 fw-bold">
                <li>Fake sender address (paypa1 instead of paypal)</li>
                <li>Creates a false sense of urgency</li>
                <li>Generic greeting ("Dear Customer" instead of your name)</li>
                <li>Threatens account closure</li>
            </ul>
        </div>

        <div class="col-lg-6 mb-4">
            <h4>Example 2: The SMS Scam (Smishing)</h4>
            <div class="card bg-light border-warning" style="max-width: 300px; margin: 0 auto;">
                <div class="card-body">
                    <div class="bg-success text-white p-2 rounded mb-2 text-center small">
                        Messages
                    </div>
                    <div class="bg-white p-2 rounded shadow-sm border mb-2">
                        <p class="small mb-0">Delivery Attempt Failed. Package #993847 is waiting for sorting. Please confirm delivery fee $1.99 here: <strong>http://usps-tracking-update.net/fee</strong></p>
                    </div>
                </div>
            </div>
            <ul class="text-danger mt-3 fw-bold">
                <li>Suspicious URL not matching official domains</li>
                <li>Requests unexpected small payments (often to steal credit card info)</li>
                <li>Preys on anticipation of packages</li>
            </ul>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
