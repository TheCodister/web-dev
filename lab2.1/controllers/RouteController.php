<?php
// Include database configuration file
include_once __DIR__ . '/../config/Database.php';

// Instantiate database and get connection
$database = new Database();
$db = $database->getConnection();

// Check if the 'page' parameter exists in the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Default to 'home' if no page is set

// Define the base path for your pages folder
$base_path = __DIR__ . '/../views/';

// Determine the file to include based on the page
switch ($page) {
    case 'about':
        $file_path = $base_path . 'about/about.php';
        break;
    case 'contact':
        $file_path = $base_path . 'contact/contact.php';
        break;
    case 'detail':
        $file_path = $base_path . 'detail/detail.php';
        break;
    case 'review':
        $file_path = $base_path . 'review/review.php';
        break;
    case 'signup':
        $file_path = $base_path . 'signup/signup.php';
        break;
    case 'login':
        $file_path = $base_path . 'login/login.php';
        break;
    case 'addactor':
        $file_path = $base_path . 'addactor/addactor.php';
        break;
    case 'edit_actor':
        $file_path = $base_path . 'edit_actor/edit_actor.php';
        break;
    case 'update_actor':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../controllers/ActorController.php';
            $actorController = new ActorController($db); // Pass the database connection here
            $actorController->updateActor($_POST);
            header("Location: index.php?page=home"); // Redirect to the homepage or another page after saving
            exit();
        }
        break;
    case 'delete_actor':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../controllers/ActorController.php';
            $actorController = new ActorController($db); // Pass the database connection here
            $actorController->deleteActor($_POST['actor_id']);
            header("Location: index.php?page=home"); // Redirect to the homepage or another page after deleting
            exit();
        }
        break;
    case 'signout':
        $file_path = $base_path . 'signout/signout.php';
        break;
    default:
        $file_path = $base_path . 'home/home.php';
        break;
}

// Check if the file exists before including it
if (file_exists($file_path)) {
    include $file_path;
} else {
    // Display a user-friendly error message if the file is missing
    echo "<h2>404 - Page not found</h2>";
    echo "<p>The page you are looking for does not exist.</p>";
}
?>
