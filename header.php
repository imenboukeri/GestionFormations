<?php
/**
 * views/partials/header.php
 * Common header for all pages with navigation
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'GestionFormations') ?> - Formation Platform</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <h1>GestionFormations</h1>
            </div>
            <nav class="nav-links">
                <a href="index.php" class="nav-link">Home</a>
                <a href="index.php?page=formations" class="nav-link">Formations</a>
                <a href="index.php?page=inscription" class="nav-link">Register</a>
                <?php if (isset($_SESSION['paiement_ok']) && $_SESSION['paiement_ok'] === true): ?>
                    <a href="index.php?page=cours" class="nav-link nav-link-active">My Courses</a>
                    <a href="index.php" onclick="return confirm('Are you sure?')" class="nav-link logout">Logout</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="main-content">
