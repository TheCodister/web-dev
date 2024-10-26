<?php
require_once 'models/Actor.php';

class ActorController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createActor($name, $birthday, $age, $actor_description, $actor_image_url) {
        $actor = new Actor($this->db);
        $actor->name = $name;
        $actor->birthday = $birthday;
        $actor->age = $age;
        $actor->actor_description = $actor_description;
        $actor->actor_image_url = $actor_image_url;

        if ($actor->create()) {
            echo "<p>Actor added successfully!</p>";
        } else {
            echo "<p>Failed to add actor.</p>";
        }
    }
    public function getActorById($actor_id) {
        $actorModel = new Actor($this->db);
        return $actorModel->getActorById($actor_id);
    }
    public function getAllActors() {
        $actorModel = new Actor($this->db);
        return $actorModel->getAllActors();
    }
    public function getActorByName($name) {
        $actorModel = new Actor($this->db);
        return $actorModel->getActorByName($name);
    }
    public function updateActor($data) {
        $actorModel = new Actor($this->db);
        return $actorModel->updateActor($data);
    }
    public function deleteActor($actor_id) {
        $actorModel = new Actor($this->db);
        return $actorModel->deleteActor($actor_id);
    }
}
?>
