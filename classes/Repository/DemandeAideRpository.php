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
    public function findById(int $di):?DemandeAide{
        $sql= " SELECT id, titre, description, statut,apprenant_id,tuteur_id
                FROM demandeAide
                where id=?";
        $stmt= $this->db->prepare($sql);
        $stmt->execute([$di]);  
        $data=$stmt->fetch(PDO::FETCH_ASSOC); 
        
        if(!$data) return null;
        return new DemandeAide(
            (int)$data['id'],$data['titre'],$data['description'],Statut::from($data['statut']),
            (int)$data['apprenant_id'],$data['tuteur_id'] ?(int)$data['tuteur_id'] :null
        );

    }

    public function findPending(): array
    {
        $sql = "
            SELECT id, titre, description, statut,
                   apprenant_id, tuteur_id
            FROM demandeAide
            WHERE statut = ?
            ";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([Statut::PENDING->value] );
        
        $demandeAide=[];
        while ($data=$stmt->fetch(PDO::FETCH_ASSOC)){
            $demandeAide[]=new DemandeAide(
               (int)$data['id'],$data['titre'],$data['description'],Statut::from($data['statut']),
            (int)$data['apprenant_id'],$data['tuteur_id'] ?(int)$data['tuteur_id'] :null
            );
        }
        return $demandeAide;
    }
}