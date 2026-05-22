 <?php
class Review {
     
    private int $id;
    private int $demandeAideId;
    private int $apprenantId;
    private int $tuteurId;
    private int $note;
    private ?string $commentaire;

    public function __construct( 
        int $id,
        int $demandeAideId,
        int $apprenantId,
        int $tuteurId,
        int $note,
        string $commentaire)
    {
        $this->id=$id;
        $this->demandeAideId=$demandeAideId;
        $this->apprenantId=$apprenantId;
        $this->tuteurId = $tuteurId;
        $this->note=$note;
        $this->commentaire=$commentaire;

    }

        public function getId(): int
    {
        return $this->id;
    }

    public function getDemandeAideId(): int
    {
        return $this->demandeAideId;
    }

    public function getApprenantId(): int
    {
        return $this->apprenantId;
    }

    public function getTuteurId(): int
    {
        return $this->tuteurId;
    }

    public function getNote(): int
    {
        return $this->note;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

}



 

 
 
 
 
 
 
 
 
 
 
