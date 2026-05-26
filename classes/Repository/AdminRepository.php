<?php

class AdminRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Nombre total demandes
    public function countDemandes(): int
    {
        $sql = "SELECT COUNT(*) FROM demandeAide";

        return (int)$this->db->query($sql)->fetchColumn();
    }

    // Nombre demandes résolues
    public function countResolved(): int
    {
        $sql = "
            SELECT COUNT(*)
            FROM demandeAide
            WHERE statut = 'resolue'
        ";

        return (int)$this->db->query($sql)->fetchColumn();
    }
        // Nombre tuteurs
    public function NombreTuteurs(): int
    {
        $sql = "
            SELECT COUNT(*)
            FROM users
            WHERE role = 'tuteur'
        ";

        return (int)$this->db->query($sql)->fetchColumn();
    }
     // Nombre apprenants
    public function NombreApprenants(): int
    {
        $sql = "
            SELECT COUNT(*)
            FROM users
            WHERE role = 'apprenant'
        ";

        return (int)$this->db->query($sql)->fetchColumn();
    }
        public function topTuteurs(): array
    {
        $sql = "
            SELECT users.nom, COUNT(demandeAide.id) as total
            FROM demandeAide

            JOIN users
            ON users.id = demandeAide.tuteur_id

            WHERE demandeAide.statut = 'resolue'

            GROUP BY users.nom

            ORDER BY total DESC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getApprenant(){

         $sql=" 
             Select* from users 
             WHERE role='apprenant'
         ";

             $stmt = $this->db->query($sql);

             return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getTuteurs(): array
    {
             $sql = "
             SELECT *
             FROM users
             WHERE role = 'tuteur'
           ";

            $stmt = $this->db->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompatibilites(): array
    {
        $sql = "
            SELECT

            apprenant.nom AS apprenant,
            tuteur.nom AS tuteur,
            competences.nom AS competence

             FROM point_faibles

             JOIN users AS apprenant
             ON apprenant.id = point_faibles.user_id

            JOIN point_forts
             ON point_forts.competence_id = point_faibles.competence_id

             JOIN users AS tuteur
             ON tuteur.id = point_forts.user_id

            JOIN competences
             ON competences.id = point_forts.competence_id

            WHERE apprenant.id != tuteur.id
            ";

        $stmt = $this->db->query($sql);

         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}