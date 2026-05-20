<?php
require_once"User.php";

class Apprenant extends User{
    public function creerDemande(string $titre, string $description, int $competenceId){


    }
    public function marquerResolue(int $demandeId):void{

    }
    public function laisserAvis(int $demandeId, int $note):void{
        if($note<1|| $note>5){
            throw new Exception("Note est invalide");
        }

    }
}