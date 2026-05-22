<?php

require_once "../classes/Entities/PointFort.php";

class PointFortRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

      public function add(PointFort $pointFort): bool
    {
        $sql = "
            INSERT INTO point_forts(user_id, competence_id)
            VALUES (?, ?)
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $pointFort->getUserID(),
            $pointFort->getCompetenceID()
        ]);
    }

 }   