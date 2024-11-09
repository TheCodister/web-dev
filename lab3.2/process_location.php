<?php
require_once 'config/database.php';

// Database connection
$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    // Check if all fields are filled
    if ($country && $state && $city) {
        // Insert location into database
        $query = "INSERT INTO locations (country, state, city) VALUES (:country, :state, :city)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':city', $city);

        if ($stmt->execute()) {
            echo "Location successfully submitted!";
        } else {
            echo "Error in submitting location.";
        }
    } else {
        echo "Please select country, state, and city.";
    }
}
?>
