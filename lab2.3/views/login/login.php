<?php
// Include the database connection file
require_once 'config/database.php'; // Adjust the path as necessary

// Create a new instance of the Database class
$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare an SQL statement to prevent SQL injection
    $query = "SELECT password FROM users WHERE username = :username LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Check if the user exists
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verify the password
        if (password_verify($password, $row['password'])) {
            setcookie('username', $username, time() + 7200, '/'); // Cookie expires in 2 hours
            echo "<script>alert('Login successfully, Welcome Back $username!');</script>";
            echo "<script>window.location.href = 'index.php?page=home';</script>";
            exit;  // Ensure no further code runs after the redirect
        } else {
            echo "<script>alert('Login Fail, incorrect password');</script>";
            echo "<script>window.location.href = 'index.php?page=login';</script>";
        }
    } else {
        echo "<script>alert('Login failed: User not found.')</script>";
        echo "<script>window.location.href = 'index.php?page=login';</script>";
    }
}
?>

<section class="d-flex flex-column align-items-center">
    <h1>Login</h1>
    <form class="d-flex flex-column gap-3 w-50" action="" method="post"> <!-- Changed the action to current file -->
        <label class="form-label" for="username">Username:</label>
        <input class="form-control" type="text" id="username" name="username" required />

        <label class="form-label" for="password">Password:</label>
        <input class="form-control" type="password" id="password" name="password" required />

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</section>
