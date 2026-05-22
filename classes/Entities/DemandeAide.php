<?php
declare(strict_types=1);
require_once "Statut.php";

class DemandeAide{
    private int $id;
    private string $titre;

    private string $description;
    private Statut $statut;
    private int $apprenant_id;
    private ? int $tuteur_id;

    public function __construct(
        int $id,
        string $titre,
        string $description,
        statut $statut,
        int $apprenant_id,
        ?int $tuteur_id = null

     ){
         $this->id = $id;
         $this->titre = $titre;
         $this->description=$description;
         $this->statut=$statut;
         $this->apprenant_id=$apprenant_id;
         $this->tuteur_id=$tuteur_id;
     }
     public function getId():int{
        return $this->id;
     }
     public function getTitre(): string{
        return $this->titre;
     }
     public function getDescription(): string{
        return $this->description;
     }
     public function getApprenant_id(): int{
        return $this->apprenant_id;
     }
     public function getTuteur_id():? int{
        return $this->tuteur_id;

     }
     public function assignTo(int $tuteur_id):void{
        if ($this->apprenant_id==$tuteur_id){
            throw new Exception("Impossible de s'assigner soit-meme");
        }
        $this->tuteur_id=$tuteur_id;
       $this->statut = Statut::ASSIGNED;

     }

     public function resolu():void{
        $this->statut = Statut::RESOLVED;
     }

     public function getStatut(): Statut {
        return $this->statut;
     }
}
