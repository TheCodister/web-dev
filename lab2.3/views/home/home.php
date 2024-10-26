<?php
require_once 'config/database.php';
require_once 'controllers/ActorController.php';

// Database connection
$database = new Database();
$db = $database->getConnection();

// Actor Controller
$actorController = new ActorController($db);
$actors = $actorController->getAllActors();

if (!empty($actors)) :
    foreach ($actors as $actor) :
?>
<section class="row mb-10">
  <div
    class="col-md-6 h-75 d-flex justify-content-center align-items-center"
    style="height: 100vh"
  >
    <img
      src="<?php echo htmlspecialchars($actor['actor_image_url']); ?>"
      class="img-fluid w-75 rounded"
      alt="Actor Image"
    />
  </div>
  <div
    class="col-md-6 h-75 d-flex justify-content-center align-items-center"
    style="height: 100vh"
  >
    <div>
      <h3 class="card-title text h3 font-weight-bold mb-2">
          <?php echo htmlspecialchars($actor['name']); ?>
      </h3>
      <p class="card-text">
          <?php echo htmlspecialchars($actor['actor_description']); ?>
      </p>
      <a href="index.php?page=view_actor&name=<?php echo urlencode($actor['name']); ?>" class="btn btn-primary">View Info</a>
      <a href="index.php?page=edit_actor&name=<?php echo urlencode($actor['name']); ?>" class="btn btn-secondary">Edit Info</a>
    </div>
  </div>
</section>
<?php 
    endforeach;
else: 
?>
    <p>No actors found.</p>
<?php endif; ?>
