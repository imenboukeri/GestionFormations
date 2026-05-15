<?php
/**
 * index.php - Central Router
 * This is the UNIQUE entry point for the entire application
 * All requests pass through this file via the 'page' parameter
 */

// Start session (required before any $_SESSION access)
session_start();

// Read the 'page' parameter from URL
// Default value is 'home' if not provided
$page = $_GET['page'] ?? 'home';

// ── SESSION PROTECTION ──────────────────────────────────
// The 'cours' page is ONLY accessible after successful payment
// $_SESSION['paiement_ok'] is set to true by PaiementController
// If user tries to access cours without payment → forced redirection
if ($page === 'cours') {
    if (!isset($_SESSION['paiement_ok']) || $_SESSION['paiement_ok'] !== true) {
        header('Location: index.php');
        exit();
    }
}

// ── ROUTING ─────────────────────────────────────────────
// The switch statement reads the $page value and loads the corresponding file
switch ($page) {
    case 'formations':
        require 'controllers/FormationController.php';
        break;
    case 'inscription':
        require 'controllers/InscriptionController.php';
        break;
    case 'paiement':
        require 'controllers/PaiementController.php';
        break;
    case 'cours':
        require 'controllers/CoursController.php';
        break;
    case 'succes':
        require 'views/succes.php';
        break;
    default:
        // Any unknown URL displays the home page
        require 'views/home.php';
}
?>
