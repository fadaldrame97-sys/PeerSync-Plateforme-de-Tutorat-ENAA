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

public function findByUser(int $userId): array
{
    $sql = "
        SELECT * FROM point_faibles
        WHERE user_id = ?
    ";

    $stmt = $this->db->prepare($sql);

    $stmt->execute([$userId]);

    $points = [];

    while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $points[] = new PointFaible(
            (int)$data['id'],
            (int)$data['user_id'],
            (int)$data['competence_id']
        );
    }

    return $points;
}
}