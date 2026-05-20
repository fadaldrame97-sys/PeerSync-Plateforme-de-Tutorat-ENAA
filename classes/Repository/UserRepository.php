<?php

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

        return null;
    }
}    