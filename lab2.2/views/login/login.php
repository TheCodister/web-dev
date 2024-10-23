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
            echo "<h2>Welcome back, $username!</h2>";
            // You can start a session here to keep the user logged in
            // session_start();
            // $_SESSION['username'] = $username;
            // Redirect to a protected page
            // header("Location: dashboard.php");
            // exit;
        } else {
            echo "<h2>Login failed: Incorrect password.</h2>";
        }
    } else {
        echo "<h2>Login failed: User not found.</h2>";
    }
}
?>

<section>
    <h1>Login</h1>
    <form action="" method="post"> <!-- Changed the action to current file -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />
        <br />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />
        <br />
        <button type="submit">Login</button>
    </form>
</section>
