<?php 
// admin.php - Admin Dashboard
require_once 'includes/db.php';
require_once 'includes/header.php'; 

// Fetch Basic Stats
// 1. Total Participants
$result = $conn->query("SELECT COUNT(*) as total FROM participants");
$row = $result->fetch_assoc();
$total_participants = $row['total'];

// 2. Average Score
$result = $conn->query("SELECT AVG(quiz_score) as avg_score FROM participants");
$row = $result->fetch_assoc();
$avg_score = round($row['avg_score'], 1);

// 3. Risk Distribution for Chart
$risk_counts = ['High Risk' => 0, 'Medium Risk' => 0, 'Safe User' => 0];
$result = $conn->query("SELECT risk_level, COUNT(*) as count FROM participants GROUP BY risk_level");
while($row = $result->fetch_assoc()) {
    if(isset($risk_counts[$row['risk_level']])) {
        $risk_counts[$row['risk_level']] = $row['count'];
    }
}

// 4. Total Simulation Attempts
$result = $conn->query("SELECT COUNT(*) as total FROM simulation_logs");
$row = $result->fetch_assoc();
$total_simulations = $row['total'];

?>

<div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-4 mt-4">
    <h2 class="text-primary">Admin Dashboard</h2>
    <span class="badge bg-secondary">MCA Project Analytics</span>
</div>

<!-- Key Metrics Row -->
<div class="row mb-4 text-center">
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-primary">
            <div class="card-body">
                <h5 class="card-title text-muted">Total Participants</h5>
                <h2 class="display-5 text-primary"><?php echo $total_participants; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-success">
            <div class="card-body">
                <h5 class="card-title text-muted">Average Score</h5>
                <h2 class="display-5 text-success"><?php echo $avg_score; ?>/10</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-warning">
            <div class="card-body">
                <h5 class="card-title text-muted">Fake Logins Attempted</h5>
                <h2 class="display-5 text-warning"><?php echo $total_simulations; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm bg-light">
            <div class="card-body">
                <h5 class="card-title text-muted">Database Status</h5>
                <h2 class="display-5 text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-server" viewBox="0 0 16 16"><path d="M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z"/><path d="M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.666v-3c0 1.473-2.985 2.667-6.667 2.667S1.333 7.807 1.333 6.334z"/><path d="M1.333 11.334v3C1.333 15.805 4.318 17 8 17s6.667-1.194 6.667-2.666v-3c0 1.473-2.985 2.667-6.667 2.667S1.333 12.807 1.333 11.334z"/></svg></h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Chart Column -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h5 class="mb-0">Risk Level Distribution</h5>
            </div>
            <div class="card-body">
                <canvas id="riskChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Logs Column -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h5 class="mb-0">Recent Simulation Interactions</h5>
            </div>
            <div class="card-body overflow-auto" style="max-height: 300px;">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Event</th>
                            <th>Target Used</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $logs = $conn->query("SELECT * FROM simulation_logs ORDER BY created_at DESC LIMIT 10");
                        if($logs->num_rows > 0) {
                            while($row = $logs->fetch_assoc()) {
                                // Extract just time for cleaner display
                                $time = date('H:i:s', strtotime($row['created_at']));
                                echo "<tr>";
                                echo "<td>" . $time . "</td>";
                                echo "<td><span class='badge bg-warning text-dark'>" . $row['event_type'] . "</span></td>";
                                echo "<td>" . htmlspecialchars($row['user_email_used']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No simulations logged yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <small class="text-muted">* Note: Passwords are NEVER logged or stored by this system.</small>
            </div>
        </div>
    </div>
</div>

<!-- Initialize Chart.js -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('riskChart').getContext('2d');
    const riskChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['High Risk (0-4)', 'Medium Risk (5-7)', 'Safe User (8-10)'],
            datasets: [{
                data: [
                    <?php echo $risk_counts['High Risk']; ?>, 
                    <?php echo $risk_counts['Medium Risk']; ?>, 
                    <?php echo $risk_counts['Safe User']; ?>
                ],
                backgroundColor: [
                    '#dc3545', // Danger/Red
                    '#ffc107', // Warning/Yellow
                    '#198754'  // Success/Green
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
});
</script>

<?php require_once 'includes/footer.php'; ?>
