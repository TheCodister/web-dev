<?php
require_once 'models/User.php';
require_once 'config/database.php';

class UserController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createUser($data) {
        $user = new User($this->conn);
        $user->username = $data['username'];
        $user->password = $data['password'];
        $user->age = $data['age'];
        $user->email = $data['email'];
        $user->phonenumber = $data['phonenumber'];

        if ($user->createUser()) {
            echo "User created successfully.";
        } else {
            echo "Unable to create user.";
        }
    }
}
?>
