<?php
/**
 * models/Formation.php
 * Handles all database operations for the 'formations' table
 */

require_once __DIR__ . '/Database.php';

class Formation {
    /**
     * Get all formations from the database
     * @return array Array of formations
     */
    public static function getAll(): array {
        $pdo = Database::connect();
        $stmt = $pdo->query(
            'SELECT id, titre, description, prix, duree, niveau, image FROM formations ORDER BY id'
        );
        return $stmt->fetchAll();
    }

    /**
     * Get a single formation by ID
     * @param int $id Formation ID
     * @return array|false Formation data or false if not found
     */
    public static function getById(int $id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            'SELECT id, titre, description, prix, duree, niveau, image, contenu FROM formations WHERE id = ?'
        );
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>
