<?php
require_once"User.php";
class Tuteur extends User{
    public function accepterDemande(int $id, string $name):void{
         parent::__construct($id, $name);

    }
}