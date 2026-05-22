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
     public function assignTo(Tuteur $tuteur): void
     {
       if ($this->apprenant_id === $tuteur->getId()) {
        throw new Exception("Impossible de s'assigner soi-même");
         }

           $this->tuteur_id = $tuteur->getId();

           $this->statut = Statut::ACCEPTEE;
     }

    public function resolu(): void
    {
       if ($this->statut !== Statut::ACCEPTEE) {
        throw new Exception("La demande doit être acceptée avant d'être résolue");
        }

    $this->statut = Statut::RESOLUE;
    }
}
