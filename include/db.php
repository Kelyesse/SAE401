<?php

function Connexion() {
    $hostname = '185.98.131.149';
    $username = 'kourd2142291';
    $password = 'c6qkzhj0sb';
    $dbname = 'kourd2142291_1u9fc1';
    $dsn = "mysql:host=$hostname;dbname=$dbname;charset=utf8mb4";

    try {
        $bdd = new PDO($dsn, $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (PDOException $e) {
        exit("Erreur de connection: " . $e->getMessage());
    }
}
 ?>