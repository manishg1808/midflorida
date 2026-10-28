<?php
/**
 * Mid Florida Scholars Academy - MySQL Database Connection
 * Database: midflorida (localhost / 127.0.0.1)
 */

if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_NAME')) define('DB_NAME', 'midflorida');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASS')) define('DB_PASS', '');
if (!defined('DB_PORT')) define('DB_PORT', 3306);
if (!defined('DB_CHARSET')) define('DB_CHARSET', 'utf8mb4');

class Database {
    private static ?PDO $instance = null;

    /**
     * Get or initialize PDO connection
     * @return PDO
     * @throws PDOException
     */
    public static function getConnection(): PDO {
        if (self::$instance === null) {
            $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$instance = new PDO($dsn, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                // If database midflorida doesn't exist yet, attempt to create it
                if ($e->getCode() == 1049) {
                    try {
                        $rootDsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";charset=" . DB_CHARSET;
                        $rootPdo = new PDO($rootDsn, DB_USER, DB_PASS, $options);
                        $rootPdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                        self::$instance = new PDO($dsn, DB_USER, DB_PASS, $options);
                    } catch (PDOException $ex) {
                        throw new PDOException("Database connection error: " . $ex->getMessage(), (int)$ex->getCode());
                    }
                } else {
                    throw new PDOException("Database connection error: " . $e->getMessage(), (int)$e->getCode());
                }
            }

            // Ensure contacts table exists automatically
            self::ensureContactsTable(self::$instance);
        }

        return self::$instance;
    }

    /**
     * Ensure the contacts table exists
     */
    private static function ensureContactsTable(PDO $pdo): void {
        $tableSql = "CREATE TABLE IF NOT EXISTS `contacts` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `full_name` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `phone` VARCHAR(50) DEFAULT NULL,
            `subject` VARCHAR(255) DEFAULT 'General Inquiry',
            `message` TEXT NOT NULL,
            `status` VARCHAR(50) DEFAULT 'New',
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX `idx_status` (`status`),
            INDEX `idx_created_at` (`created_at`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

        try {
            $pdo->exec($tableSql);
        } catch (PDOException $e) {
            // Ignore error if table exists or permissions restricted
            error_log("Contacts table check warning: " . $e->getMessage());
        }
    }
}

/**
 * Convenience helper to get DB connection
 */
function getDbConnection(): ?PDO {
    try {
        return Database::getConnection();
    } catch (Exception $e) {
        error_log("Database Connection Error: " . $e->getMessage());
        return null;
    }
}
