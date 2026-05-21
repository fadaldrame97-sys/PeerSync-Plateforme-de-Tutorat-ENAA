<?php

require_once "../Entities/User.php";
require_once "../Entities/apprenant.php";
require_once "../Entities/tuteur.php";

class UserRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

      public function findById(int $id): ?User {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) return null;

        if($data['role']==='tuteur'){
            return new Tuteur((int)$data['id'],$data['name']);
        }
        return new Apprenant((int)$data['id'],$data['name']);

       
      
    }
}    