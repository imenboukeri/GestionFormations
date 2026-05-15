<?php
/**
 * models/Database.php
 * Singleton pattern: ensures only one PDO connection throughout the application
 * Benefits: avoids opening multiple connections to MySQL
 */

class Database {
    private static $instance = null;

    /**
     * Get or create the PDO connection
     * @return PDO
     */
    public static function connect(): PDO {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host=localhost;dbname=gestion_formations;charset=utf8mb4',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                die('Database Error: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>
