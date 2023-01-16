<?php
namespace Config;

use PDO;
use PDOException;

class DBConnection
{
    public function connect(){
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
        return $pdo;
    }

}