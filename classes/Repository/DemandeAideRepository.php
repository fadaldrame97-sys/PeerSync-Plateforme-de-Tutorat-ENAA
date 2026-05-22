<?php
declare(strict_types=1);
require_once'../classes/Entities/DemandeAide.php';
require_once'../classes/Entities/Statut.php';

class DemandeAideRepository{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db=$db;
    }

    public function create(DemandeAide $demandeAide):bool{
        $sql = "
            INSERT INTO demandeAide
            (titre, description, statut, apprenant_id, tuteur_id)
            VALUES (?, ?, ?, ?, ?)
            ";
        $stmt=$this->db->prepare($sql);
            return $stmt->execute([
                  $demandeAide->getTitre(),
                  $demandeAide->getDescription(),
                  $demandeAide->getStatut()->value,
                  $demandeAide->getApprenant_id(),
                  $demandeAide->getTuteur_id()
              ]) ;   

    }
    public function findById(int $id):?DemandeAide{
        $sql= " SELECT id, titre, description, statut,apprenant_id,tuteur_id
                FROM demandeAide
                where id=?";
        $stmt= $this->db->prepare($sql);
        $stmt->execute([$id]);  
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
        $stmt->execute([Statut::OUVERTE->value] );
        
        $demandeAide=[];
        while ($data=$stmt->fetch(PDO::FETCH_ASSOC)){
            $demandeAide[]=new DemandeAide(
               (int)$data['id'],$data['titre'],$data['description'],Statut::from($data['statut']),
            (int)$data['apprenant_id'],$data['tuteur_id'] ?(int)$data['tuteur_id'] :null
            );
        }
        return $demandeAide;
    }

    public function findALL():array{
            $sql = "SELECT * FROM demandeAide";

    $stmt = $this->db->query($sql);

    $demandes = [];

    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $demandes[] = new DemandeAide(
            (int)$data['id'],
            $data['titre'],
            $data['description'],
            Statut::from($data['statut']),
            (int)$data['apprenant_id'],
            $data['tuteur_id'] !== null
                ? (int)$data['tuteur_id']
                : null
        );
    }

    return $demandes;


    }

    public function update(DemandeAide $demandeAide): bool
    {
        $sql = "
           UPDATE demandeAide
           SET statut = ?, tuteur_id = ?
           WHERE id = ?
           ";

        $stmt = $this->db->prepare($sql);

           return $stmt->execute([
           $demandeAide->getStatut()->value,
           $demandeAide->getTuteur_id(),
           $demandeAide->getId()
           ]);
    }

}