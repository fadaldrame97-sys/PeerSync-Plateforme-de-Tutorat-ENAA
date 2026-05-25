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
    public function countTuteurs(): int
    {
        $sql = "
            SELECT COUNT(*)
            FROM users
            WHERE role = 'tuteur'
        ";

        return (int)$this->db->query($sql)->fetchColumn();
    }
}