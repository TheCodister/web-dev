<?php
require_once 'config/database.php';

class Actor {
    private $conn;
    private $table_name = "actor";

    public $actor_id;
    public $name;
    public $birthday;
    public $age;
    public $actor_description;
    public $actor_image_url;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, birthday, age, actor_description, actor_image_url)
                  VALUES (:name, :birthday, :age, :actor_description, :actor_image_url)";

        $stmt = $this->conn->prepare($query);

        // Sanitize and bind parameters
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->birthday = htmlspecialchars(strip_tags($this->birthday));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->actor_description = htmlspecialchars(strip_tags($this->actor_description));
        $this->actor_image_url = htmlspecialchars(strip_tags($this->actor_image_url));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':birthday', $this->birthday);
        $stmt->bindParam(':age', $this->age);
        $stmt->bindParam(':actor_description', $this->actor_description);
        $stmt->bindParam(':actor_image_url', $this->actor_image_url);

        return $stmt->execute();
    }

    public function getActorById($actor_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE actor_id = :actor_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':actor_id', $actor_id);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllActors() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getActorByName($name) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name = :name";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateActor($data) {
        $query = "UPDATE " . $this->table_name . " 
                  SET name = :name, birthday = :birthday, age = :age, actor_description = :actor_description, actor_image_url = :actor_image_url 
                  WHERE actor_id = :actor_id";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':birthday', $data['birthday']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->bindParam(':actor_description', $data['actor_description']);
        $stmt->bindParam(':actor_image_url', $data['actor_image_url']);
        $stmt->bindParam(':actor_id', $data['actor_id']);
    
        return $stmt->execute();
    }
    public function deleteActor($actor_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE actor_id = :actor_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':actor_id', $actor_id);
    
        return $stmt->execute();
    }
    
}
?>
