<?php
// Include the database connection file
require_once 'config/database.php'; // Adjust the path as necessary

// Create a new instance of the Database class
$database = new Database();
$db = $database->getConnection();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Prepare an SQL statement to prevent SQL injection
    $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>alert('Thank you for signing up, $username!')</script>";
        echo "<script>window.location.href = 'index.php?page=login';</script>";
    } else {
        echo "<script>alert('Error: Unable to create user.')</script>";
    }
}
?>

<section>
    <h1>Sign Up</h1>
    <form action="" method="post"> <!-- Changed the action to current file -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />
        <br />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />
        <br />
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
        <br />
        <button type="submit">Sign Up</button>
    </form>
</section>
