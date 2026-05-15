<?php
/**
 * controllers/PaiementController.php
 * Role: Handle payment simulation and session management
 */

require_once dirname(__DIR__) . '/models/Inscription.php';

// Get the registration ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Verify the registration exists
if ($id <= 0) {
    header('Location: index.php');
    exit();
}

$inscription = Inscription::getById($id);

// Check if registration was found
if (!$inscription) {
    header('Location: index.php');
    exit();
}

$erreur_paiement = false;

// Handle POST request (payment form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mode = $_POST['mode'] ?? '';

    if ($mode === 'ok') {
        // ── SUCCESSFUL PAYMENT ──────────────────────────────
        // 1. Update payment status in database
        Inscription::marquerPaye($id);

        // 2. Store information in SESSION
        // Sessions allow transmitting data between pages
        // without putting them in the URL (secure)
        $_SESSION['paiement_ok'] = true;
        $_SESSION['inscription_id'] = $id;
        $_SESSION['formation_titre'] = $inscription['formation_titre'];
        $_SESSION['etudiant_prenom'] = $inscription['prenom'];

        // 3. Redirect to confirmation page
        header('Location: index.php?page=succes&id=' . $id);
        exit();
    } else {
        // ── PAYMENT FAILED ──────────────────────────────
        // Stay on the page with an error message
        $erreur_paiement = true;
    }
}

// Load the view
require dirname(__DIR__) . '/views/paiement.php';
?>
