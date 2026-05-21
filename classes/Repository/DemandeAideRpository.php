<?php
declare(strict_types=1);
require_once'../Entites/DemandAide.php';
require_once'../Entites/Statut.php';

class DemandeAideRpository{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db=$db;
    }

    public function creat(DemandeAide $demandeAide):bool{
        $sql = "
            INSERT INTO demandeAide
            (titre, description, statut, apprenant_id, tuteur_id)
            VALUES (?, ?, ?, ?, ?)
            ";
        $stmt=$this->db->prepare($sql);
            return $stmt->execute([
                  $demandeAide->getTitre(),
                  $demandeAide->getDescrption(),
                  $demandeAide->getStatut()->value,
                  $demandeAide->getApprenant_id(),
                  $demandeAide->getTiteur_id()
              ]) ;   

    }
}