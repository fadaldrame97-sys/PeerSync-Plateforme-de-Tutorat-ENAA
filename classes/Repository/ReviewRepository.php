<?php

require_once "../classes/Entities/Review.php";

class ReviewRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

        public function add(Review $review): bool
    {
        $sql = "
            INSERT INTO reviews
            (demandeAide_id, apprenant_id, tuteur_id, note, commentaire)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $review->getDemandeAideId(),
            $review->getApprenantId(),
            $review->getTuteurId(),
            $review->getNote(),
            $review->getCommentaire()
        ]);
    }
}
