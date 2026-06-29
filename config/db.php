<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');      // XAMPP default
define('DB_PASS', '');          // XAMPP default is empty
define('DB_NAME', 'student_mgmt');

function getDB() {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            die("<div style='padding:20px;color:red;font-family:monospace;'>
                 DB Connection Failed: " . $e->getMessage() . "
                 </div>");
        }
    }
    return $pdo;
} 