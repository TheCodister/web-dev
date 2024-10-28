<?php
// Include database and controller files
include_once 'config/Database.php';
include_once 'controllers/ActorController.php';

// Instantiate the Database and get the connection
$database = new Database();
$db = $database->getConnection();

// Instantiate the ActorController with the database connection
$actorController = new ActorController($db);

// Check for the 'name' parameter in the URL
if (isset($_GET['name'])) {
    $actorName = $_GET['name'];
    $actor = $actorController->getActorByName($actorName);

    if (!$actor) {
        echo "<h2>Actor not found.</h2>";
        exit;
    }
} else {
    echo "<h2>Actor name not specified.</h2>";
    exit;
}
?>

<section class="container mt-4">
    <h1>Edit Actor Information</h1>
    <form action="index.php?page=update_actor" method="post">
        <input type="hidden" name="actor_id" value="<?php echo htmlspecialchars($actor['actor_id']); ?>" />

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($actor['name']); ?>" required />
        </div>

        <div class="mb-3">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo htmlspecialchars($actor['birthday']); ?>" required />
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" id="age" name="age" class="form-control" value="<?php echo htmlspecialchars($actor['age']); ?>" required />
        </div>

        <div class="mb-3">
            <label for="actor_description" class="form-label">Description</label>
            <textarea id="actor_description" name="actor_description" class="form-control" required><?php echo htmlspecialchars($actor['actor_description']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="actor_image_url" class="form-label">Image URL</label>
            <input type="url" id="actor_image_url" name="actor_image_url" class="form-control" value="<?php echo htmlspecialchars($actor['actor_image_url']); ?>" />
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
    </form>
    <form action="index.php?page=delete_actor" method="post">
        <input type="hidden" name="actor_id" value="<?php echo htmlspecialchars($actor['actor_id']); ?>" />
        <button type="submit" class="btn btn-danger mt-5">Delete Actor</button>
    </form>
</section>
