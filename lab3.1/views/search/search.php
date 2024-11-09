<?php
require_once 'config/database.php';
require_once 'models/Actor.php';

if (isset($_GET['query'])) {
    $database = new Database();
    $db = $database->getConnection();

    $actorModel = new Actor($db);
    $name = $_GET['query'];
    $suggestions = $actorModel->searchActor($name); // Returns an array of matching actors

    header('Content-Type: application/json');
    echo json_encode($suggestions);
}
?>
