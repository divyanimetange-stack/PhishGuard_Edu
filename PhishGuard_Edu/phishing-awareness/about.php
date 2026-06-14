<?php 
// about.php - Educational content defining phishing
require_once 'includes/header.php'; 
?>

<div class="content-card p-4 p-md-5 mb-5">
    <h2 class="text-primary border-bottom pb-2 mb-4">What is Phishing?</h2>
    
    <p class="fs-5"><strong>Phishing</strong> is a type of social engineering attack often used to steal user data, including login credentials and credit card numbers.</p>
    
    <p>It occurs when an attacker, masquerading as a trusted entity (like a bank, university, or a well-known service), dupes a victim into opening an email, instant message, or text message. The recipient is then tricked into clicking a malicious link, which can lead to the installation of malware, the freezing of the system as part of a ransomware attack, or the revealing of sensitive information.</p>

    <h3 class="mt-5 text-secondary">Common Types of Phishing</h3>
    <div class="row mt-3">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Email Phishing</h5>
                    <p class="card-text">The most common form. Attackers send thousands of fraudulent emails hoping a few people will click the malicious link and provide credentials.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Spear Phishing</h5>
                    <p class="card-text">Highly targeted attacks aimed at specific individuals or companies. Attackers gather personal information beforehand to make the email look highly credible.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Whaling</h5>
                    <p class="card-text">A specific type of spear phishing aimed at high-profile targets like CEOs or CFOs to steal large sums of money or highly confidential data.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Smishing & Vishing</h5>
                    <p class="card-text"><strong>Smishing</strong> uses SMS text messages to lure victims. <strong>Vishing</strong> uses voice phone calls, often with automated messages creating a false sense of urgency.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-info mt-4">
        <strong>Key Takeaway:</strong> Cybercriminals rely on human error rather than technical exploits. Awareness and skepticism are your best defenses.
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
