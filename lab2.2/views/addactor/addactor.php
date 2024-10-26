<?php
require_once 'config/database.php';
require_once 'controllers/ActorController.php';

$database = new Database();
$db = $database->getConnection();
$actorController = new ActorController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $actor_description = $_POST['actor_description'];
    $actor_image_url = $_POST['actor_image_url'];

    $actorController->createActor($name, $birthday, $age, $actor_description, $actor_image_url);
}
?>

<section>
    <h1>Add Actor</h1>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" required>
        <br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <br>
        
        <label for="actor_description">Description:</label>
        <textarea id="actor_description" name="actor_description" required></textarea>
        <br>
        
        <label for="actor_image_url">Image URL:</label>
        <input type="text" id="actor_image_url" name="actor_image_url" required>
        <br>
        
        <button type="submit">Add Actor</button>
    </form>
</section>
