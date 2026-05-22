<?php
require_once "../classes/Entities/PointFaible.php";

class PointFaibleRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

public function add(PointFaible $pointFaible): bool
{
    $sql = "
        INSERT INTO point_faibles(user_id, competence_id)
        VALUES (?, ?)
    ";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        $pointFaible->getUserId(),
        $pointFaible->getCompetenceId()
    ]);
}    
}