<?php
/**
 * models/Inscription.php
 * Handles all database operations for the 'inscriptions' table
 */

require_once __DIR__ . '/Database.php';

class Inscription {
    /**
     * Add a new registration to the database
     * Returns the ID of the inserted row (used to redirect to payment)
     * @param string $nom Student's last name
     * @param string $prenom Student's first name
     * @param string $email Student's email
     * @param int $formation_id Formation ID
     * @return int ID of the new registration
     * @throws Exception If email is already registered for this formation
     */
    public static function ajouter($nom, $prenom, $email, $formation_id): int {
        $pdo = Database::connect();

        // Check if this email is already registered for this formation
        $check = $pdo->prepare(
            'SELECT id FROM inscriptions WHERE email = ? AND formation_id = ?'
        );
        $check->execute([$email, $formation_id]);

        if ($check->fetch()) {
            throw new Exception('This email is already registered for this formation.');
        }

        // Insert new registration
        $stmt = $pdo->prepare(
            'INSERT INTO inscriptions (nom, prenom, email, formation_id, statut_paiement, date_inscription)'
            . ' VALUES (?, ?, ?, ?, "en_attente", NOW())'
        );
        $stmt->execute([$nom, $prenom, $email, $formation_id]);

        return (int) $pdo->lastInsertId();
    }

    /**
     * Get a registration by ID with associated formation info
     * Uses SQL JOIN to link both tables
     * @param int $id Registration ID
     * @return array|false Registration data with formation info or false if not found
     */
    public static function getById($id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            'SELECT i.*, f.titre AS formation_titre, f.prix'
            . ' FROM inscriptions i'
            . ' JOIN formations f ON i.formation_id = f.id'
            . ' WHERE i.id = ?'
        );
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * Update payment status to 'paye' (paid)
     * @param int $id Registration ID
     * @return void
     */
    public static function marquerPaye($id): void {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            'UPDATE inscriptions SET statut_paiement = "paye" WHERE id = ?'
        );
        $stmt->execute([$id]);
    }

    /**
     * Get all registrations (for admin purposes)
     * @return array Array of registrations
     */
    public static function getAll(): array {
        $pdo = Database::connect();
        $stmt = $pdo->query(
            'SELECT i.*, f.titre AS formation_titre FROM inscriptions i'
            . ' JOIN formations f ON i.formation_id = f.id'
            . ' ORDER BY i.date_inscription DESC'
        );
        return $stmt->fetchAll();
    }
}
?>
