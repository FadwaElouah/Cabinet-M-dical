<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private $connection;

    public function __construct($config)
    {
        try {
            $dsn = "pgsql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
            $this->connection = new PDO($dsn, $config['user'], $config['password']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    // Autres méthodes utiles...
}

// define("DB_HOST" , 'localhost');
// define("DB_NAME" , 'cabinet_medical');
// define("DB_USER" , 'postgres');
// define("DB_PASS" , '1234');
// define("DB_CHARSET" , 'utf8mb4');

// class Database {
//     private static ?Database $instance = null;
//     private $host;
//     private $db;
//     private $user;
//     private $pass;
//     // private $charset;
//     private $pdo;

//     private function __construct() {
//         $this->host = DB_HOST;
//         $this->db = DB_NAME;
//         $this->user = DB_USER;
//         $this->pass = DB_PASS;

//         $this->connect();
//     }


//     private function connect() {
//         $dsn = "pgsql:host={$this->host};dbname={$this->db}";
//         $options = [
//             PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//             PDO::ATTR_EMULATE_PREPARES   => false,
//         ];
    
//         try {
//             $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
//             echo 'Gooooood !';
//         } catch (PDOException $e) {
//             throw new PDOException("Error connecting to the database: " . $e->getMessage());
//         }
//     }
    


//     public static function getInstance(): Database {
//         if (self::$instance === null) {
//             self::$instance = new self();
//         }

//         return self::$instance;
//     }


//     public function getConnection() {
//         return $this->pdo;
//     }
// }


// $db_connect = Database::getInstance()->getConnection();