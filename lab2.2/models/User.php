<?php
class User {
    private $conn;
    private $table_name = "users";

    public $user_id;
    public $username;
    public $password;
    public $age;
    public $email;
    public $phonenumber;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createUser() {
        $query = "INSERT INTO " . $this->table_name . " (username, password, age, email, phonenumber)
                  VALUES (:username, :password, :age, :email, :phonenumber)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':age', $this->age);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phonenumber', $this->phonenumber);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
