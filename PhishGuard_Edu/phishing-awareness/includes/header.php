<?php
// includes/header.php
// Common header included on every page to maintain consistent design
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phishing Awareness Simulation</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">PhishGuard Edu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Phishing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="examples.php">Examples</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fw-bold" href="simulation.php">Simulation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="quiz.php">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Container starts here and ends in footer.php -->
<main class="container my-5">
