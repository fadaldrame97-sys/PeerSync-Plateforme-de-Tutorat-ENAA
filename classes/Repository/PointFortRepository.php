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
        public function findByUser(int $userId): array
    {
        $sql = "
            SELECT * FROM point_forts
            WHERE user_id = ?
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$userId]);

        $points = [];

        while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $points[] = new PointFort(
                (int)$data['id'],
                (int)$data['user_id'],
                (int)$data['competence_id']
            );
        }

        return $points;
    }
}
   