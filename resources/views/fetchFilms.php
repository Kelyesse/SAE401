<?php
require_once '../../Helpers/dbConnection.php'; // Adjust the path to your Database.php file

header('Content-Type: application/json');

try {
    $db = Database::getInstance();
    $connection = $db->getConnection();

    $stmt = $connection->prepare("SELECT id, title, image FROM films ORDER BY RAND() LIMIT 5");
    $stmt->execute();
    $films = $stmt->fetchAll();

    echo json_encode($films);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
