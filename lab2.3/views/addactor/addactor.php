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
        <label class="form-label" for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" required>
        <br>
        
        <label class="form-label" for="birthday">Birthday:</label>
        <input class="form-control" type="date" id="birthday" name="birthday" required>
        <br>
        
        <label class="form-label" for="age">Age:</label>
        <input class="form-control" type="number" id="age" name="age" required>
        <br>
        
        <label class="form-label" for="actor_description">Description:</label>
        <textarea id="actor_description" class="form-control" name="actor_description" required></textarea>
        <br>
        
        <label class="form-label" for="actor_image_url">Image URL:</label>
        <input class="form-control" type="text" id="actor_image_url" name="actor_image_url" required>
        <br>
        
        <button class="btn btn-primary" type="submit">Add Actor</button>
    </form>
</section>
