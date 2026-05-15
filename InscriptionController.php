<?php
/**
 * controllers/InscriptionController.php
 * Role: Handle form submission, validate data, call model, redirect to payment
 */

require_once dirname(__DIR__) . '/models/Inscription.php';
require_once dirname(__DIR__) . '/models/Formation.php';

$erreurs = [];
$formations = Formation::getAll(); // Get list to populate <select>

// Pre-select a formation if user comes from the formations page
$formation_preselect = isset($_GET['formation_id']) ? (int)$_GET['formation_id'] : null;

// Handle POST request (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and clean the data
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $formation_id = (int)($_POST['formation_id'] ?? 0);

    // Validation
    if (empty($nom)) {
        $erreurs[] = 'The last name is required.';
    }
    if (empty($prenom)) {
        $erreurs[] = 'The first name is required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = 'Invalid email address.';
    }
    if ($formation_id <= 0) {
        $erreurs[] = 'Please select a formation.';
    }

    // If no validation errors, proceed with registration
    if (empty($erreurs)) {
        try {
            // Call the model to insert into database
            $id = Inscription::ajouter($nom, $prenom, $email, $formation_id);

            // Redirect to payment page with registration ID
            header('Location: index.php?page=paiement&id=' . $id);
            exit();
        } catch (Exception $e) {
            $erreurs[] = $e->getMessage();
        }
    }
}

// Display the view (with $erreurs and $formations available)
require dirname(__DIR__) . '/views/inscription.php';
?>
