<?php
declare(strict_types=1);

class DemandAide{
    private int $id;
    private string $titre;

    private string $description;
    private string $statut;
    private int $apprenant_id;
    private int $tuteur_id;

    public function __construct(
        int $id,
        string $titre,
        string $description,
        string $statut,
        int $apprenant_id,
        int $tuteur_id,

     ){
        
     }
}
