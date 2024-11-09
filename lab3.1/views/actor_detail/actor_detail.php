<?php
require_once 'config/database.php';
require_once 'models/Actor.php';

if (isset($_GET['name'])) {
    $actorName = $_GET['name'];

    $database = new Database();
    $db = $database->getConnection();

    $actorModel = new Actor($db);
    $actorDetails = $actorModel->getActorByName($actorName); // Create this method in the Actor model

    if ($actorDetails) {
        echo "<h1>{$actorDetails['name']}</h1>";
        echo "<p>{$actorDetails['actor_description']}</p>";
        echo "<img src='{$actorDetails['actor_image_url']}' alt='{$actorDetails['name']}'>";
        echo "<p>Birthday: {$actorDetails['birthday']}</p>";
        echo "<p>Age: {$actorDetails['age']}</p>";
    } else {
        echo "<p>Actor not found.</p>";
    }
} else {
    echo "<p>No actor selected.</p>";
}
?>
