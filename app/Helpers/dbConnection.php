<?php

class Database
{
    private static $_instance = NULL;
    private static $connection;

    final private function __construct()
    {
    }

    final public static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new Database();
        }

        return self::$_instance;
    }

    final public function __clone()
    {
        trigger_error('Impossible de cloner', E_USER_ERROR);
    }

    final public function getConnection()
    {
        $host = "10.21.162.221";
        $dbName = "mediatheque";
        $port = "3306";
        $username = "root";
        $password = "root";

        if (self::$connection == NULL) {
            try {
                $dsn = "mysql:host=$host;dbname=$dbName;port=$port";
                self::$connection = new PDO($dsn, $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                throw new Exception('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}


