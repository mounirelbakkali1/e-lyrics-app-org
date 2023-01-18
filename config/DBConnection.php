<?php
namespace Config;

use PDO;
use PDOException;

class DBConnection
{

    public static function connect(){
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
//        $pdo->beginTransaction();
//        // if attr 3ameer
//
//
//
//
//        //else
//                // insert artist
//
//                // get last id (fk)
//                $pdo->lastInsertId();
//                // insert lyric
//
//
//                $pdo->commit();
//
//
//                $pdo->rollBack();
        return $pdo;
    }

}