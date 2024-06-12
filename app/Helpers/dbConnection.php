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

    public function getConnection()
    {
        $host = '185.98.131.149';
        $username = 'kourd2142291';
        $password = 'c6qkzhj0sb';
        $dbName = 'kourd2142291_1u9fc1';
        $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

        if (self::$connection == NULL) {
            try {
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
?>