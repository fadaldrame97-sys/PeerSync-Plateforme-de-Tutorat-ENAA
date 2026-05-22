<?php

require_once "../classes/Entities/Competence.php";

class CompetenceRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM competences";

        $stmt = $this->db->query($sql);

        $competences = [];

        while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $competences[] = new Competence(
                (int)$data['id'],
                $data['nom']
            );
        }

        return $competences;
    }

        public function findById(int $id): ?Competence
    {
        $sql = "SELECT * FROM competences WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$data) {
            return null;
        }

        return new Competence(
            (int)$data['id'],
            $data['nom']
        );
    }

}    