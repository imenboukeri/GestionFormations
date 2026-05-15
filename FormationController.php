<?php
/**
 * controllers/FormationController.php
 * Role: Fetch all formations and pass them to the view
 */

require_once dirname(__DIR__) . '/models/Formation.php';

// Get all formations from the database
$formations = Formation::getAll();

// If no formations found, set empty array
if (!$formations) {
    $formations = [];
}

// Load the view
require dirname(__DIR__) . '/views/formations.php';
?>
